<?php

use App\Enum\BlocksType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

if (!function_exists('user')) {
    function user(): ?User
    {
        return Auth::user() ?? null;
    }
}

if (!function_exists('deceased')) {
    function deceased(): ?\App\Models\Deceased
    {
        return user()->deceased ?? null;
    }
}

if (!function_exists('qrCodeCreate')) {
    function qrCodeCreate(): string
    {
        $deceased = deceased();

        if (!$deceased->slug) {
            return response()->json('Slug not found', 404);
        }

        $url = url()->full() . '/' . $deceased->slug;
        $path = 'storage/images/qrCode/' . $deceased->slug . '.png';

        $pathPhoto = $deceased->blocks()->where('type', BlocksType::Image)->first()
            ?->images()->inRandomOrder()->first()->path ?? null;

        if ($pathPhoto) {
            $pathPhoto = str_contains($pathPhoto, 'http') ? $pathPhoto : public_path($pathPhoto);

            $image = QrCode::size(500)
                ->format('png')
                ->errorCorrection('H')
                ->merge($pathPhoto, .2, true)
                ->generate($url);
        } else {
            $image = QrCode::size(500)
                ->format('png')
                ->errorCorrection('H')
                ->generate($url);
        }

        Storage::put('public/images/qrCode/' . $deceased->slug . '.png', $image);

        $deceased->update([
            'qr_code' => $path,
        ]);

        return $path;
    }
}
