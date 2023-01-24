<?php

namespace App\Http\Controllers\Api;

use App\Superhero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperheroRequest;

class SuperheroController extends Controller
{

    public function list($id = null)
    {
            return $id ? Superhero::with('race', 'eyeColor', 'hairColor', 'publisher')->findOrFail($id) : Superhero::all();
    }

    public function getSuperheroesFilter(SuperheroRequest $request)
    {
        if($request->header('api-superheroes-key') == env('API_SUPERHEROES_KEY')){

            // name/fullname filters avariable because in the future alternative versions of superheros maybe be added
            return $superheroes = Superhero::where('name', $request->name)
                ->orWhere('fullname', $request->fullname)
                ->orWhere('strength', $request->strength)
                ->orWhere('speed', $request->speed)
                ->orWhere('durability', $request->durability)
                ->orWhere('power', $request->power)
                ->orWhere('combat', $request->combat)
                ->orWhere('race_id', $request->race_id)
                ->orWhere('height_feet', $request->height_feet)
                ->orWhere('height_cm', $request->height_cm)
                ->orWhere('weight_lb', $request->weight_lb)
                ->orWhere('weight_kg', $request->weight_kg)
                ->orWhere('eye_color_id', $request->eye_color_id)
                ->orWhere('hair_color_id', $request->hair_color_id)
                ->orWhere('publisher_id', $request->publisher_id)
                ->orderBy($request->orderByColumn ? $request->orderByColumn : 'id', $request->orderByMethod ? $request->orderByMethod : 'asc')
                ->with('race', 'eyeColor', 'hairColor', 'publisher')
                ->paginate($request->paginate ? $request->paginate : 10);

        }else{
            return 403;
        }
    }


}

