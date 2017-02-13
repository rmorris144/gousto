<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoxRequests extends FormRequest
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
            'title' => 'required',
            'slug',
            'marketing_description' => 'required|max:2000',
            'calories_kcal' => 'required',
            'protein_grams' => 'required',
            'fat_grams' => 'required',
            'carbs_grams' => 'required',
        ];
    }
}
