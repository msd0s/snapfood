<?php

namespace App\Http\Requests;

use App\Rules\DiscountIdRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFoodPartyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'food_id'=>'required|numeric|unique:foodparties',
            'discount_id'=>new DiscountIdRule(),
            'food_count'=>'required',
            'status'=>'bail|required|numeric',
        ];
    }
}
