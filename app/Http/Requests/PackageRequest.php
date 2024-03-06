<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
{
    
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
            "id"=>"sometimes",
            "package_name"=>"required|max:232|string",
            "package_price"=> "required|numeric",
            "currency"=> "required|string",
            "package_duration_hour"=> Rule::when($this->input("package_duration_day"===null), ["required", "date_format:H:i:s"]),
            "package_duration_day"=> Rule::when($this->input("package_duration_hour"===null), ["required", "date_time"])
        ];
    }
    public function messages(): array
    {
        return [
            "package_name.required"=> "Package name is required",
            "package_name.max"=> "Package name should not be more than 232 characters",
            "package_name.string"=> "Package name should be a string",
            "package_price.required"=> "Package price is required",
            "package_price.float"=> "Package price should be a float",
            "currency.required"=> "Currency is required",
            "currency.string"=> "Currency should be a string",
            "package_duration_hour.required"=> "Package duration hour is required",
            "package_duration_hour.date_format"=> "Package duration hour should be in the format of H:i:s",
            "package_duration_day.required"=> "Package duration day is required",
            "package_duration_day.date_time"=> "Package duration day should be in the format of Y-m-d H:i:s"
        ];
    }
}
