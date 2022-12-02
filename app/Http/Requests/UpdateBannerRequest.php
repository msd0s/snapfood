<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'title'=>'required',
            'url'=>'required',
            'alternate' => 'required',
            'picture'=>'bail|required|mimes:jpg,jpeg,png,gif|max:4096',
            'status'=>'bail|required|numeric',
        ];
    }
}
