<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationalUnitUpdateRequest extends FormRequest
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
            'offcie_no' => ['nullable', 'numeric'],
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'prioritie_id' => ['nullable', 'exists:priorities,id'],
        ];
    }
}
