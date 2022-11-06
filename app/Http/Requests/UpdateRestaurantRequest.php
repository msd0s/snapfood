<?php

namespace App\Http\Requests;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'phone'=>new PhoneRule(),
            'address'=>'required',
            'account_number'=>'bail|required|numeric',
            'restaurantcategory_id'=>'required',
            'picture'=>'bail|required|mimes:jpg,jpeg,png,gif|max:4096',
            'send_price'=>'bail|required|numeric',
            'restaurant_status'=>'required',
        ];
    }
}
