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
            'price' => ['numeric','min:0'],
            'discountPrice' => ['numeric','min:0'],
            'count' => ['numeric','min:1'],
            'fio' => ['required','string'],
            'phone' => ['required','string','min:9'],
            'email' => ['required','string','email'],
            'delivery' => ['required','string'],
            'name' => ['required','string'],
        ];
    }
}
