<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class StockLevels extends Model
{
    use Orderable;

    protected $fillable = [];

    public function recipe()
    {
        return $this->belongsTo(Recipies::class);
    }
}
