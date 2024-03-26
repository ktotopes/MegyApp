<?php

declare(strict_types=1);

namespace App\Enum;

enum OrderDelivery: string
{
    case CDEK = 'СДЭК';
    case MailRussia = 'ПочтаРоссии';
}
