<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        // dd($this->all());
        return [
        'name' => 'required|string',
        'result' => 'required|numeric',
        'class' => 'required|numeric',
        'father_name' => 'required|string',
        'father_number' => 'required|string',
        ];
       
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'result.required' => 'Result is required',
            'class.required' => 'Class is required',
            'father_name.required' => 'Father Name is required',
            'father_number.required' => 'Father Number is required',
        ];
    }
}
