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
            'customer_name' => 'required|string|max:255',
            'comment' => 'nullable|string|max:1000',
            'order_status' => 'nullable|in:Новый,Выполнен',
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id'
        ];
    }

    protected function prepareForValidation()
    {
        if (empty($this->order_status)) {
            $this->merge([
                'order_status' => 'Новый'
            ]);
        }
    }
}
