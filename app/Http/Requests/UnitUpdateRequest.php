<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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
            'telephone' => ['required', 'max:255', 'string'],
            'fax' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'campuse_id' => ['required', 'exists:campuses,id'],
            'director_id' => ['required', 'exists:directors,id'],
        ];
    }
}
