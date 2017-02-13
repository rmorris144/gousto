<?php

namespace App\Transformers;

use App\Rating;
use League\Fractal\TransformerAbstract;

class RatingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Rating $rating)
    {
        return [
            'id' => $rating->id,
            'rating' => $rating->rating,
        ];
    }
}
