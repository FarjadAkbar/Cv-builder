<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjectiveRequest extends FormRequest
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
            'career_object' => ['required', 'string', 'max:1000'],
        ];
    }

    public function messages(){
        return [
            'career_object.required' =>":attribute must not be empty",
            'career_object.string' =>":attribute should be a string"
        ];
    }
}
