<?php

namespace App\Observers;

use App\Models\Video;
use Illuminate\Support\Facades\File;

class VideoObserver
{
    public function deleted(Video $video): void
    {
        if (File::exists(public_path($video->path))) {
            File::delete(public_path($video->path));
        }
    }
}
