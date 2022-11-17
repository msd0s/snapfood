<?php

namespace App\Http\Requests\Api;

use App\Rules\MelliCodeRule;
use App\Rules\MobileRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'required',
            'melli_code' => new MelliCodeRule(),
            'mobile' => new MobileRule(),
            'phone' => new PhoneRule(),
        ];
    }
}
