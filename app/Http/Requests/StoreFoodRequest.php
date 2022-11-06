<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'foodcategory_id'=>'required',
            'picture'=>'bail|required|mimes:jpg,jpeg,png,gif|max:4096',
            'raw_materials'=>'required',
            'price'=>'bail|required|numeric',
            'count'=>'bail|required|numeric',
            'discount_id'=>'bail|required|numeric',
            'status'=>'bail|required|numeric',
        ];
    }
}
