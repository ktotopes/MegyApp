<?php

namespace App\Console\Commands;

use App\Models\Deceased;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class deleteFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = [
            ...Storage::disk('public')->files('images'),
            ...Storage::disk('public')->files('videos'),
            ...Storage::disk('public')->files('images/qrCode'),
        ];

        foreach ($files as $value) {
            $strPath = 'storage/' . $value;

            if (! Image::where('path', $strPath)->exists() && ! Video::where('path', $strPath)->exists() && ! Deceased::where('qr_code', $strPath)->exists()) {
                Storage::delete(str_replace('storage', 'public', $strPath));
            }

        }
    }
}
