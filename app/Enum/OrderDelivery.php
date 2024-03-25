<?php

declare(strict_types=1);

namespace App\Enum;

enum OrderDelivery: string
{
    case СДЭК = 'СДЭК';
    case ПочтаРоссии = 'ПочтаРоссии';

    public function delivery(): string
    {
        return match ($this) {
            OrderDelivery::СДЭК => 'СДЭК',

            OrderDelivery::ПочтаРоссии => 'ПочтаРоссии',
        };
    }
}
