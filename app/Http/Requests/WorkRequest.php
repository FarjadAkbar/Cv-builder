<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return [
            'company_name.required' =>":attribute must not be empty",
            'company_name.string' =>":attribute should be a string",
            'position.required' =>":attribute must not be empty",
            'position.string' =>":attribute should be a string",
            'year.required' =>":attribute must not be empty",
            'year.integer' =>":attribute should be an integer",
        ];
    }
}
