<?php

namespace App\Http\Controllers;

use App\Race;
use App\EyeColor;
use App\HairColor;
use App\Publisher;
use App\Superhero;
use App\RequestLog;
use Illuminate\Support\Str;
use App\Imports\SuperheroesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{
    public function index()
    {
        return view('imports.superhero');
    }

    //Import
    public function superheroesImport()
    {
        try {

            if (($open = fopen($request->file, "r")) !== FALSE) {

                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
    
                    if($data[0] == 'id'){
                        // Ignore header line
                    }else{
                        
                        $race = Race::firstOrCreate([
                            'type' => $data[8] ? $data[8] : 'No Data'
                        ]);
    
                        $eyeColor = EyeColor::firstOrCreate([
                            'detail' => $data[13] ? $data[13] : 'No Data'
                        ]);
    
                        $hairColor = HairColor::firstOrCreate([
                            'detail' => $data[14] ? $data[14] : 'No Data'
                        ]);
    
                        $publisher = Publisher::firstOrCreate([
                            'name' => $data[15] ? $data[15] : 'No Data'
                        ]);
                        
                        //TODO Talk with client to normalice CSV fields (height_feet, height_cm, weight_lb, weight_kg) before import if is possible (format field in this occasion instead)
                        $superheroes = Superhero::firstOrCreate([
                            'id' => $data[0]
                        ], [
                            'name'          => $data[1],
                            'fullname'      => $data[2],
                            'strength'      => $data[3],
                            'speed'         => $data[4],
                            'durability'    => $data[5],
                            'power'         => $data[6],
                            'combat'        => $data[7],
                            'race_id'       => $race->id,
                            'height_feet'   => $data[9] == '-' ? 0 : $data[9],
                            'height_cm'     => Str::contains($data[10], 'meters') ? (preg_replace('/[^0-9]/', '', $data[10])) * 100 : preg_replace('/[^0-9]/', '', $data[10]), 
                            'weight_lb'     => $data[11] == '- lb' ? 0 : preg_replace('/[^0-9]/', '', $data[11]),
                            'weight_kg'     => preg_replace('/[^0-9]/', '', $data[12]),
                            'eye_color_id'  => $eyeColor->id,
                            'hair_color_id' => $hairColor->id,
                            'publisher_id' => $publisher->id,
                        ]);
    
                    }
                }
    
                fclose($open);
            }
    
            return Redirect::back()->with('messageSuccess', 'Upload successful');  

        }catch (\Exception $e) {
            $requestLog = RequestLog::create([
                'payload' => json_encode($data),
                'error' => 'Error: ' . $e->getCode() . ' - ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine()
            ]);
            
            return 'Error: ' . $e->getCode() . ' - ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
        }
        
    }

    //Import with library (https://laravel-excel.com/)
    public function superheroesImportLibrary() 
    {
    
        try {
            
            Excel::import(new SuperheroesImport,request()->file('file'));

            return Redirect::back()->with('messageSuccess', 'Upload successful');  

        }catch (\Exception $e) {

            $requestLog = RequestLog::create([
                'payload' => json_encode($data),
                'error' => 'Error: ' . $e->getCode() . ' - ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine()
            ]);
            
            return 'Error: ' . $e->getCode() . ' - ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
        }
    }

}
