<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourneyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'start_date' => 'required',
            'ending' => 'required',
            'color' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'ending.required' => 'The end date field is required',
        ];
    }
}
