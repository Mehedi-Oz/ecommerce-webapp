<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $brandId = $this->route('id');

        return [
            'name' => 'required|string|max:255|unique:brands,name,' . $brandId,
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'is_active' => 'required|boolean',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The brand name is required.',
            'name.unique' => 'This brand name already exists. Please choose a different name.',
            'name.max' => 'The brand name must not exceed 255 characters.',
            'description.max' => 'The description must not exceed 1000 characters.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg, webp.',
            'image.max' => 'The image size must not exceed 5MB.',
            'is_active.required' => 'Please select the publication status.',
            'is_active.boolean' => 'The publication status must be either active or inactive.',
        ];
    }
}