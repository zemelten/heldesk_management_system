<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends FormRequest
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
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'customer_id' => ['nullable', 'exists:customers,id'],
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
