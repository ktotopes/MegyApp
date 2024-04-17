<?php

declare(strict_types=1);

namespace App\Enum;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case WaitingForCapture = 'waiting_for_capture';
    case Succeeded = 'succeeded';
    case Canceled = 'canceled';
}