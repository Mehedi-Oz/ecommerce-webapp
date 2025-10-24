<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
        $subcategoryId = $this->route('id');

        return [
            'name' => 'required|string|max:255|unique:subcategories,name,' . $subcategoryId,
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'required|boolean'
        ];
    }


    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The subcategory name is required.',
            'name.unique' => 'This subcategory name already exists.',
            'name.max' => 'The subcategory name must not exceed 255 characters.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category does not exist.',
            'description.max' => 'The description must not exceed 1000 characters.',
            'is_active.required' => 'Please select the publication status.',
            'is_active.boolean' => 'The publication status must be either active or inactive.',
        ];
    }
}
