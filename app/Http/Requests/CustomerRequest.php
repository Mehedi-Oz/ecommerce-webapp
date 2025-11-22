<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:customers,email',
            'mobile' => 'required|string|max:15|unique:customers,mobile',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'nid' => 'nullable|string|max:20|unique:customers,nid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'blood_group' => 'nullable|string|max:3',
        ];
    }
}
