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
            'game' => 'required',
            'start_date' => 'required',
            'ending' => 'required|date|after_or_equal:start_date',
            'color' => '',
            'logo' => 'dimensions:ratio=1/1'
        ];
    }

    public function messages(): array
    {
        return [
            'ending.required' => 'The end date field is required',
            'ending.after' => 'The ending date should be later than the start date.',
            'logo.dimensions' => 'Logo image should have 1:1 ratio dimenstions.',
        ];
    }
}
