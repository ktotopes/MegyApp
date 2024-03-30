<?php

namespace App\Http\Controllers\Traits;

use App\Models\Image;
use App\Models\Deceased;
use App\Models\Video;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

trait UploadFilesTrait
{
    private ?string $mainEntity = null;

    public function uploadImages(string $mainEntity)
    {
        request()->validate([
            'images' => 'array|max:100',
            'images.*.file' => [File::types(['png', 'jpg', 'gif'])->min(1)->max(1024 * 12)],
            'images.*.description' => ['nullable', 'string', 'min:3', 'max:255'],
        ]);

        $this->mainEntity = $mainEntity;

        $this->uploadFiles(
            request('images'),
            'images',
            Image::class,
        );

        return response()->json(['message' => 'Image created successfully..']);
    }

    public function uploadVideos(string $mainEntity)
    {
        request()->validate([
            'videos' => 'array|max:5',
            'videos.*.file' => [File::types(['mp4', 'mov'])->min(1)->max(1024 * 12)],
            'videos.*.description' => ['nullable', 'string', 'min:3', 'max:255'],
        ]);

        $this->mainEntity = $mainEntity;

        $this->uploadFiles(
            request('videos'),
            'videos',
            Video::class,
        );

        return response()->json(['message' => 'Image created successfully..']);
    }

    private function uploadFiles(?array $files, string $folder, string $model) {

        if (empty($files)) {
            return;
        }

        foreach ($files as $fileData) {
            /** @var UploadedFile $file */
            $file = $fileData['file'];

            $filePath = $file->storeAs("public/{$folder}", Str::random(). '.' . $file->extension());

            $data = [
                'path' => str_replace('public', 'storage', $filePath),
            ];

            if($folder == 'images') {
                $data['imageable_id'] = user()->infoTheDeceased->id;
                $data['imageable_type'] = $this->mainEntity;
            }elseif ($folder == 'videos') {
                $data['videoable_id'] = user()->infoTheDeceased->id;
                $data['videoable_type'] = $this->mainEntity;
            }

            if (isset($fileData['description'])) {
                $data['description'] = $fileData['description'];
            }

            $model::create($data);
        }
    }
}
