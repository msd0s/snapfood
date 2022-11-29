<?php

namespace App\Http\Requests\Api;

use http\Env\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'cart_id' => 'bail|required|numeric|exists:orders,id,user_id,'.auth()->user()->id.'|unique:comments,order_id',
            'score' => 'bail|required|numeric|min:0|max:5',
            'message' => 'required',
        ];
    }
}
