<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectorUpdateRequest extends FormRequest
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
            'full_name' => ['nullable', 'max:255', 'string'],
            'sex' => ['nullable', 'in:male,female,other'],
            'email' => ['nullable', 'email'],
            'user_id' => ['nullable'],
            'phone' => ['nullable', 'max:255', 'string'],
        ];
    }
}
