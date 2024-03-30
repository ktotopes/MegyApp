<?php

namespace App\Http\Requests;

use App\Enum\BlocksType;
use App\Rules\AddressRule;
use App\Rules\BlocksValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeceasedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        //dd($this->all());

        return [
            'background_img' => 'image|mimes:png,jpg,gif|max:2048',
            'photo' => 'image|mimes:png,jpg,gif|max:2048',
            'fio' => 'required|string|min:3',
            'title' => 'required|string|min:3',
            'coordinates' => ['required', 'string', new AddressRule()],
            'date_death' => ['required', 'date', 'date_format:d.m.Y'],
            'date_birthday' => ['required', 'date', 'date_format:d.m.Y'],

            'blocks' => ['required', 'array', new BlocksValidation()],
        ];
    }
}
