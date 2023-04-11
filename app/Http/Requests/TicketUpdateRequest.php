<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
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
            'status' => ['nullable', 'max:255'],
            'description' => ['nullable', 'max:255', 'string'],
            'customer_id' => ['nullable', 'exists:users,id'],
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'problem_id' => ['nullable', 'exists:problems,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'user_support_id' => ['nullable', 'exists:user_supports,id'],
            'prioritie_id' => ['nullable', 'exists:priorities,id'],
        ];
    }
}
