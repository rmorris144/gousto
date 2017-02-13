<?php

namespace App;

use App\Recipies;
use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    protected $fillable = ['title','slug','calories_kcal','protein_grams','fat_grams','carbs_grams','bulletpoint1','bulletpoint2','bulletpoint3','gousto_reference'];

    public function boxType()
    {
        return $this->hasMany(BoxType::class);
    }
    
    public function recipes()
    {
        return $this->hasMany(Recipies::class);
    }

}
