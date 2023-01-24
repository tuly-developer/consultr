<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperheroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'fullname' => 'string',
            'strength' => 'integer|min:0',
            'speed' => 'integer|min:0',
            'durability' => 'integer|min:0',
            'power' => 'integer|min:0',
            'combat' => 'integer|min:0',
            'race_id' => 'integer|min:1',
            'height_feet' => 'string|min:0',
            'height_cm' => 'string|min:0',
            'weight_lb' => 'string|min:0',
            'weight_kg' => 'string|min:0',
            'eye_color_id' => 'integer|min:1',
            'hair_color_id' => 'integer|min:1',
            'publisher_id' => 'integer|min:1',
        ];
    }
    
}
