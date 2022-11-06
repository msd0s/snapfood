<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'day'=>'required',
            'from_hours'=>'nullable|date_format:H:i',
            'to_hours'=>'nullable|date_format:H:i',
            'is_closed'=>'required',
        ];
    }
}
