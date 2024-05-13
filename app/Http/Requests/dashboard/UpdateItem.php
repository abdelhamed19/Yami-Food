<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItem extends FormRequest
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
            "name" => "sometimes|string|min:2|max:50",
            "description" => "sometimes|string|max:255",
            "price" => "sometimes|numeric",
            "category_id" => "sometimes|exists:categories,id",
            "status" => "sometimes|in:active,drafted",
            "img" => "nullable|image",
        ];
    }
}
