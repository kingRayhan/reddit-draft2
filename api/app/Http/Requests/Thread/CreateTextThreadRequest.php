<?php

namespace App\Http\Requests\Thread;

use Illuminate\Foundation\Http\FormRequest;

class CreateTextThreadRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:200'],
            'body' => ['required', 'min:3'],
            'thumbnail' => ['url'],
        ];
    }
}
