<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
            'title'=>'required',
            'coupon'=>'bail|required|unique:discounts',
            'price'=>'bail|required|numeric',
            'percent'=>'bail|required|numeric|min:0|max:100',
            'start_date'=>'bail|required|date',
            'expire_date'=>'bail|required|date',
            'status'=>'bail|required|numeric',
        ];
    }
}
