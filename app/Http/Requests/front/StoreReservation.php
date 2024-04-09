<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservation extends FormRequest
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
            'reserve.name' => 'required|string|min:2|max:20',
            'reserve.email' => 'required|email',
            'reserve.phone' => 'required|string|min:7|max:30',
            'reserve.date' => 'required|date',
            'reserve.time' => 'required',
            'reserve.persons' => 'required|numeric|min:1|max:8',
            'reserve.notes' => 'nullable|string|min:2|max:100',
        ];
    }
    public function messages()
    {
        return [
        'reserve.name.required' => 'Name is required',
        'reserve.name.string' => 'Name must be string',
        'reserve.name.min' => 'Name must be at least 2 characters',
        'reserve.name.max' => 'Name must be at most 20 characters',
        'reserve.email.required' => 'Email is required',
        'reserve.email.email' => 'Email must be valid',
        'reserve.phone.required' => 'Phone is required',
        'reserve.phone.string' => 'Phone must be string',
        'reserve.phone.min' => 'Phone must be at least 7 characters',
        'reserve.phone.max' => 'Phone must be at most 30 characters',
        'reserve.date.required' => 'Date is required',
        'reserve.date.date' => 'Date must be valid',
        'reserve.time.required' => 'Time is required',
        'reserve.persons.required' => 'Persons is required',
        'reserve.persons.numeric' => 'Persons must be numeric',
        
    ];

    }
}
