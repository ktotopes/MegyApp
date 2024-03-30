<?php

declare(strict_types=1);

namespace App\Enum;

enum BlocksType: string
{
    case Text = 'text';
    case Video = 'video';
    case Image = 'image';
}
