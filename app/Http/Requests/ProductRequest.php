<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $productId = $this->route('id');

        return [
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'brand_id' => 'required|exists:brands,id',
            'unit_id' => 'required|exists:units,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:products,code,' . $productId,
            'model' => 'nullable|string|max:255',
            'stock_amount' => 'required|integer|min:0',
            'regular_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'short_description' => 'nullable|string|max:1000',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'other_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'is_active' => 'required|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'subcategory_id.required' => 'Please select a subcategory.',
            'brand_id.required' => 'Please select a brand.',
            'unit_id.required' => 'Please select a unit.',
            'name.required' => 'The product name is required.',
            'code.required' => 'The product code is required.',
            'code.unique' => 'This product code already exists.',
            'stock_amount.required' => 'The stock amount is required.',
            'regular_price.required' => 'The regular price is required.',
            'selling_price.required' => 'The selling price is required.',
            'image.image' => 'The featured image must be a valid image file.',
            'other_images.*.image' => 'Each additional image must be a valid image file.',
        ];
    }
}
