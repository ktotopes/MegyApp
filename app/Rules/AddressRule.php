<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class AddressRule implements ValidationRule, DataAwareRule
{
    public array $data;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $location[] = explode(',', $this->data['coordinates']);

        $lat = $location[0][0] ?? null;
        $long = $location[0][1] ?? null;

    //    if (preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $lat) && preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $long)) {
     //       $fail("The {$attribute} is invalid.");
    //    }

        if (!$lat || !$long) {
            $fail("The {$attribute} is invalid.");
        }
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}

//'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
//'long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
