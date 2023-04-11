<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingStoreRequest extends FormRequest
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
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'id' => ['required', 'max:255'],
            'name' => ['nullable', 'max:255', 'string'],
        ];
    }
}