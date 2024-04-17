<?php

declare(strict_types=1);

namespace App\Enum;

enum PaymentStatus: string
{
    case pending = 'pending';
    case waiting_for_capture = 'waiting_for_capture';
    case succeeded = 'succeeded';
    case canceled = 'canceled';
}