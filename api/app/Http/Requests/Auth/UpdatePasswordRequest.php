<?php

namespace App\Http\Requests\Auth;

use App\Rules\ValidateCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_password' => ['required', new ValidateCurrentPassword()],
            'password' => ['required', 'min:6', 'confirmed']
        ];
    }
}
