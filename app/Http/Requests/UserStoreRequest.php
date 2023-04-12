<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => [
                'required',
                'unique:users,username',
                'max:255',
                'string',
            ],
            'full_name' => ['nullable', 'max:255', 'string'],
            'email' => ['nullable', 'unique:users,email', 'email'],
            'password' => ['required'],
            'roles' => 'array',
        ];
    }
}
