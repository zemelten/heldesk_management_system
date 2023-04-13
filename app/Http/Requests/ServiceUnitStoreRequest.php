<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUnitStoreRequest extends FormRequest
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
            'name' => ['nullable', 'max:255', 'string'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'fax' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email'],
            'discription' => ['nullable', 'max:255', 'string'],
            'leader_id' => ['nullable', 'exists:leaders,id'],
        ];
    }
}
