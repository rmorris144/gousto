<?php

namespace App;

use App\Traits\Orderable;

use Illuminate\Database\Eloquent\Model;

class RecipeDiet extends Model
{
    use Orderable;

    protected $fillable = ['season','base','protein_source','preparation_time_mins','shelf_life_days'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipies::class);
    }

    
    
}
