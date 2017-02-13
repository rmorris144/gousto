<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Recipies;
use Illuminate\Http\Request;

class RecipeRatingController extends Controller
{
    public function store(Request $request, $recipe)
    {
        $recipies = Recipies::find($recipe);

//        $this->authorize('rating', $recipies);

        if ($request->user()->hasRatings($recipies)) {
            return response(null, 409);
        }

        $rating = new Rating;

        $rating->rating = $request->rating;

        $rating->user()->associate($request->user());

        $recipies->ratings()->save($rating);

        return response(null, 204);
    }
}
