<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $unitId = $this->route('id');

        return [
            'name' => 'required|string|max:255|unique:units,name,' . $unitId,
            'code' => 'required|string|max:50|unique:units,code,' . $unitId,
            'description' => 'nullable|string|max:1000',
            'is_active' => 'required|boolean',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The unit name is required.',
            'name.unique' => 'This unit name already exists. Please choose a different name.',
            'name.max' => 'The unit name must not exceed 255 characters.',
            'code.required' => 'The unit code is required.',
            'code.unique' => 'This unit code already exists. Please choose a different code.',
            'code.max' => 'The unit code must not exceed 50 characters.',
            'description.max' => 'The description must not exceed 1000 characters.',
            'is_active.required' => 'Please select the publication status.',
            'is_active.boolean' => 'The publication status must be either active or inactive.',
        ];
    }
}
