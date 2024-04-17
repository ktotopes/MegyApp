<?php

namespace App\Console\Commands;

use App\Models\Deceased;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteFiles extends Command
{
    protected $signature = 'app:delete-files';

    protected $description = 'Command description';

    public function handle(): void
    {
        $files = [
            ...Storage::disk('public')->files('images'),
            ...Storage::disk('public')->files('videos'),
            ...Storage::disk('public')->files('images/qrCode'),
        ];

        foreach ($files as $value) {
            $strPath = 'storage/' . $value;

            if (! Image::where('path', $strPath)->exists() && ! Video::where('path', $strPath)
                    ->exists() && ! Deceased::where('qr_code', $strPath)->exists()) {
                Storage::delete(str_replace('storage', 'public', $strPath));
            }

        }
    }
}
