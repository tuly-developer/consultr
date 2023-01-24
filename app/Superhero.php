<?php

namespace App;

use App\Race;
use App\EyeColor;
use App\HairColor;
use App\Publisher;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $fillable = [
        'name', 
        'fullname', 
        'strength',
        'speed',
        'durability',
        'power',
        'combat',
        'race_id',
        'height_feet',
        'height_cm',
        'weight_lb',
        'weight_kg',
        'eye_color_id',
        'hair_color_id',
        'publisher_id',
    ];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function eyeColor()
    {
        return $this->belongsTo(EyeColor::class);
    }

    public function hairColor()
    {
        return $this->belongsTo(HairColor::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

}
