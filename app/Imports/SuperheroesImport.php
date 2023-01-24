<?php

namespace App\Imports;

use App\Race;
use App\EyeColor;
use App\HairColor;
use App\Publisher;
use App\Superhero;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SuperheroesImport implements ToModel, WithStartRow
{

    public function startRow() : int{
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $race = Race::firstOrCreate([
            'type' => $row[8] ? $row[8] : 'No Data'
        ]);

        $eyeColor = EyeColor::firstOrCreate([
            'detail' => $row[13] ? $row[13] : 'No Data'
        ]);

        $hairColor = HairColor::firstOrCreate([
            'detail' => $row[14] ? $row[14] : 'No Data'
        ]);

        $publisher = Publisher::firstOrCreate([
            'name' => $row[15] ? $row[15] : 'No Data'
        ]);
        
        //TODO Talk with client to normalice CSV fields (height_feet, height_cm, weight_lb, weight_kg) before import if is possible (format field in this occasion instead)
        return new Superhero([
            'name'          => $row[1] ? Str::title($row[1]) : null, 
            'fullname'      => $row[2] ? Str::title($row[2]) : null, 
            'strength'      => $row[3], 
            'speed'         => $row[4], 
            'durability'    => $row[5], 
            'power'         => $row[6], 
            'combat'        => $row[7], 
            'race_id'       => $race->id,
            'height_feet'   => $row[9] == '-' ? 0 : $row[9],
            'height_cm'     => Str::contains($row[10], 'meters') ? (preg_replace('/[^0-9]/', '', $row[10])) * 100 : preg_replace('/[^0-9]/', '', $row[10]), 
            'weight_lb'     => $row[11] == '- lb' ? 0 : preg_replace('/[^0-9]/', '', $row[11]),
            'weight_kg'     => preg_replace('/[^0-9]/', '', $row[12]),
            'eye_color_id'  => $eyeColor->id,
            'hair_color_id' => $hairColor->id,
            'publisher_id'  => $publisher->id, 
        ]);
    }
}
