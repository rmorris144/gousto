<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipesRequests extends FormRequest
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
//            'box_type' => 'required',
//            'title' => 'required',
//            'slug' => 'required',
//            'season' => 'required',
//            'base' => 'required',
////            'protein_source' => 'required',
////            'preparation_time_mins' => 'required',
////            'shelf_life_days' => 'required',
//            'equipment_needed' => 'required',
//            'origin_country' => 'required',
//            'recipe_cuisine' => 'required',
//            'in_your_box' => 'required',
//            'gousto_reference' => 'required',
        ];
    }
}
