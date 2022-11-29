<?php

namespace App\Http\Requests\Api;

use http\Env\Response;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        if (!empty($this->input('food_id')) && empty($this->input('restaurant_id')))
        {
            return [
                'food_id'=>'bail|required|numeric',
            ];
        }elseif (!empty($this->input('restaurant_id')) && empty($this->input('food_id')))
        {
            return [
                'restaurant_id'=>'bail|required|numeric',
            ];
        }else
        {
            return [
                'status'=>'required',
            ];
        }
    }
}
