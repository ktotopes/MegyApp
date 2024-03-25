<?php

namespace App\Http\Requests;

use App\Rules\AddressRule;
use Illuminate\Foundation\Http\FormRequest;

class InfoTheDeceasedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'background_img' => 'image|mimes:png,jpg,gif|max:2048',
            'photo' => 'image|mimes:png,jpg,gif|max:2048',
            'fio' => 'required|string|min:3',
            'title' => 'required|string|min:3',
            'coordinates' => ['required', 'string', new AddressRule()],
            'dateDeath' => ['required', 'date', 'date_format:d.m.Y'],
            'dateBirthday' => ['required', 'date', 'date_format:d.m.Y'],
        ];
    }
}
