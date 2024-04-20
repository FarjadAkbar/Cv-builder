<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'degree' => ['required', 'string', 'max:255'],
            'institute' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return [
            'degree.required' =>":attribute must not be empty",
            'degree.string' =>":attribute should be a string",
            'institute.required' =>":attribute must not be empty",
            'institute.string' =>":attribute should be a string",
            'year.required' =>":attribute must not be empty",
            'year.integer' =>":attribute should be an integer",
        ];
    }
}
