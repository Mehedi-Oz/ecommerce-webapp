<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'order_timestamp' => 'required|date',
            'order_total' => 'required|numeric|min:0',
            'tax_total' => 'required|numeric|min:0',
            'shipping_total' => 'required|numeric|min:0',
            'order_status' => 'nullable|string|max:20',
            'delivery_address' => 'required|string',
            'delivery_status' => 'nullable|string|max:20',
            'payment_type' => 'required|string|max:50',
            'payment_status' => 'nullable|string|max:20',
            'currency' => 'nullable|string|max:10',
            'transaction_id' => 'nullable|string',
        ];
    }
}
