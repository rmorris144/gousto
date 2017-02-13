<?php

namespace App\Http\Controllers;

use App\Comments;
use App\RecipeDiet;
use App\Transformers\RecipeTransformer;
use App\Http\Requests\UpdateRecipeRequest;
use Illuminate\Http\Request;

use App\Recipies;

use App\Http\Requests\StoreRecipesRequests;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipies::latestFirst()->paginate(3);

        $recipesCollection = $recipes->getCollection();

        return fractal()
            ->collection($recipesCollection)
            ->parseIncludes(['user'])
            ->transformWith(new RecipeTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($recipes))
            ->toArray();
    }

    public function show($recipies)
    {
        $id = Recipies::where('slug', $recipies)->first();

        return fractal()
            ->item($id)
            ->parseIncludes(['user', 'rating'])
            ->transformWith(new RecipeTransformer)
            ->toArray();
    }
    
    public function store(StoreRecipesRequests $request)
    {
        $recipies = new Recipies();

        $recipies->box_type = $request->box_type;
        $recipies->title = $request->title;
        $recipies->slug = $request->slug;
        $recipies->short_title = $request->short_title;
        $recipies->marketing_description = $request->marketing_description;
        $recipies->equipment_needed = $request->equipment_needed;
        $recipies->origin_country = $request->origin_country;
        $recipies->recipe_cuisine = $request->recipe_cuisine;
        $recipies->in_your_box = $request->in_your_box;
        $recipies->gousto_reference = $request->gousto_reference;

        $diet = new RecipeDiet;

        $diet->diet_type = $request->box_type;
        $diet->calories_kcal = $request->calories_kcal;
        $diet->protein_grams = $request->protein_grams;
        $diet->fat_grams = $request->fat_grams;
        $diet->carbs_grams = $request->carbs_grams;

        $diet->preparation_time_mins = $request->preparation_time_mins;
        $diet->shelf_life_days = $request->shelf_life_days;
        $diet->season = $request->season;
        $diet->base = $request->base;
        $diet->protein_source = $request->protein_source;

        $comments = new Comments;

        $comments->bulletpoint1 = $request->bulletpoint1;
        $comments->bulletpoint2 = $request->bulletpoint2;
        $comments->bulletpoint3 = $request->bulletpoint3;

        $recipies->stockLevels()->associate($request->user());

        $comments->save();
        $diet->save();

        $recipies->user()->associate($request->user());
        $recipies->recipeDiet()->associate($diet->id);

        $recipies->comment()->associate($comments->id);

        $recipies->save();

        return fractal()
            ->item($recipies)
            ->parseIncludes(['user'])
            ->transformWith(new RecipeTransformer)
            ->toArray();
    }

    public function update(UpdateRecipeRequest $request, $recipe)
    {
        $recipies = Recipies::find($recipe);
        $this->authorize('update', $recipies);

        $recipies->box_type = $request->box_type;
        $recipies->title = $request->title;
        $recipies->slug = $request->slug;
        $recipies->short_title = $request->short_title;
        $recipies->marketing_description = $request->marketing_description;
        $recipies->equipment_needed = $request->equipment_needed;
        $recipies->origin_country = $request->origin_country;
        $recipies->recipe_cuisine = $request->recipe_cuisine;
        $recipies->in_your_box = $request->in_your_box;
        $recipies->gousto_reference = $request->gousto_reference;

        $diet = RecipeDiet::where('id', $recipies->recipe_diet_id)->first();


        $diet->diet_type = $request->box_type;
        $diet->calories_kcal = $request->calories_kcal;
        $diet->protein_grams = $request->protein_grams;
        $diet->fat_grams = $request->fat_grams;
        $diet->carbs_grams = $request->carbs_grams;

        $diet->preparation_time_mins = $request->preparation_time_mins;
        $diet->shelf_life_days = $request->shelf_life_days;
        $diet->season = $request->season;
        $diet->base = $request->base;
        $diet->protein_source = $request->protein_source;

        $comments = Comments::where('id', $recipies->comment_id)->distinct()->first();

        $comments->bulletpoint1 = $request->bulletpoint1;
        $comments->bulletpoint2 = $request->bulletpoint2;
        $comments->bulletpoint3 = $request->bulletpoint3;

        $recipies->stockLevels()->associate($request->user());

        $comments->save();
        $diet->save();

        $recipies->user()->associate($request->user());
        $recipies->recipeDiet()->associate($diet->id);

        $recipies->comment()->associate($comments->id);

        $recipies->save();

        return fractal()
            ->item($recipies)
            ->parseIncludes(['user'])
            ->transformWith(new RecipeTransformer)
            ->toArray();
    }

    public function destroy($id)
    {
        $recipe = Recipies::find($id);

        $this->authorize('destroy', $recipe);

        if (!Recipies::find($id)) {
            return response(null, 403);
        }

        $recipe->delete();

        return response('Recipe Deleted', 204);
    }
    
    
}
