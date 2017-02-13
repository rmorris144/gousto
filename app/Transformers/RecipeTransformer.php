<?php

namespace App\Transformers;

use App\Recipies;
use League\Fractal\TransformerAbstract;

class RecipeTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['user', 'rating'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Recipies $recipies)
    {
        return [
            'id' => $recipies->id,
            'box_type' => $recipies->box_type,
            'season' => $recipies->recipeDiet->season,
            'base' => $recipies->recipeDiet->base,
            'protein_source' => $recipies->recipeDiet->protein_source,
            'preparation_time_mins' => $recipies->recipeDiet->preparation_time_mins,
            'shelf_life_days' => $recipies->recipeDiet->shelf_life_days,
            'equipment_needed' => $recipies->equipment_needed,
            'origin_county' => $recipies->origin_country,
            'recipe_cuisine' => $recipies->recipe_cuisine,
            'in_your_box' => $recipies->in_your_box,
            'stock' => $recipies->getStock($recipies->box_type),
        ];
    }

    public function includeUser(Recipies $recipies)
    {
        return $this->item($recipies->user, new UserTransformer);
    }

    public function includeRating(Recipies $recipies)
    {
        return $this->collection($recipies->ratings, new RatingTransformer);
    }
}
