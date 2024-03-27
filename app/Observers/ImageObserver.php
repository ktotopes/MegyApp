<?php

namespace App\Observers;

use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageObserver
{
    public function deleted(Image $image): void
    {
        if (File::exists(public_path($image->path))) {
            File::delete(public_path($image->path));
        }
    }
}
