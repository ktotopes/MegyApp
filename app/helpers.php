<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

if (! function_exists('user')) {
    function user(): ?User
    {
        return Auth::user() ?? null;
    }
}

if (! function_exists('qrCodeCreate')) {
    function qrCodeCreate(): string
    {
        $info = user()->infoTheDeceased;

        if (! $info->slug) {
            return response()->json('Slug not found', 404);
        }

        $url = url()->full() . '/' . $info->slug;
        $path = 'storage/images/qrCode/' . $info->slug . '.png';

        $pathPhoto = $info->images()->inRandomOrder()->first()->path;


        $image = QrCode::size(500)
            ->format('png')
            ->errorCorrection('H')
            ->merge(public_path($pathPhoto), .2, true)
            ->generate($url);

        Storage::put('public/images/qrCode/' . $info->slug . '.png', $image);

        $info->update([
            'qr_code' => $path
        ]);

        return $path;
    }
}
