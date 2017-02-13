<?php

namespace App;

use App\Traits\Orderable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Recipies extends Model
{
    use Orderable;
    
    protected $fillable = ['box_type','title','slug','short_title','marketing_description','equipment_needed','origin_country','recipe_cuisine','in_your_box'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function boxes()
    {
        return $this->belongsTo(Boxes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipeDiet()
    {
       return $this->belongsTo(RecipeDiet::class);
    }

    public function getStock($stock)
    {
        return Recipies::where('box_type', $stock)->count();
    }

    public function comment()
    {
        return $this->belongsTo(Recipies::class);
    }
    
    public function stockLevels()
    {
        return $this->belongsTo(StockLevels::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rating');
    }
}
