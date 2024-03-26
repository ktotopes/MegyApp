<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\UploadFilesTrait;
use App\Http\Requests\InfoTheDeceasedRequest;
use App\Http\Resources\InfoTheDeceasedResource;
use App\Models\DeadManText;
use App\Models\Image;
use App\Models\InfoTheDeceased;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Grimzy\LaravelMysqlSpatial\Types\Point;


class InfoTheDeceasedController extends Controller
{
    use UploadFilesTrait;

    public function update(InfoTheDeceasedRequest $request)
    {
        $photoPath = null;
        $backgroudImgPath = null;

        $info = user()->infoTheDeceased;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $photoPath = $file->storeAs('public/images/photo', Str::random() . '.' . $file->extension());

            Storage::delete(str_replace('storage', 'public', $info->photo));
        }
        if ($request->has('background_img')) {
            $file = $request->file('background_img');
            $backgroudImgPath = $file->storeAs('public/images/background_img',
                Str::random() . '.' . $file->extension());

            Storage::delete(str_replace('storage', 'public', $info->background_img));
        }

        $location[] = explode(',', $request->input('coordinates'));

        $info->update([
            ...$request->validated(),
            'photo' => str_replace('public', 'storage', $photoPath),
            'background_img' => str_replace('public', 'storage', $backgroudImgPath),
            'slug' => Str::slug($request->input('title')),
            'dateDeath' => $request->input('dateDeath'),
            'dateBirthday' => $request->input('dateBirthday'),
            'coordinates' => new Point($location[0][0], $location[0][1]),
        ]);

        $this->uploadImages(InfoTheDeceased::class);
        $this->uploadVideos(InfoTheDeceased::class);
        $this->createDeadManText($request);

        qrCodeCreate();

        return response()->json(
            new InfoTheDeceasedResource($info->load('videos', 'images', 'texts')),
        );
    }

    private function createDeadManText(Request $request)
    {
        $request->validate([
            'blocks' => 'required|array|min:1',
            'blocks.*.texts.*' => 'required|string|min:3',
        ]);

        $infoTheDeceased = auth()->user()->infoTheDeceased;

        foreach ($request->input('blocks') as $key => $block) {
            foreach ($block['texts'] as $value) {
                DeadManText::create([
                    'text' => $value,
                    'block_number' => $key,
                    'textable_id' => $infoTheDeceased->id,
                    'textable_type' => InfoTheDeceased::class,
                ]);
            }
        }

        return response()->json(['message' => 'DeadManText created successfully..']);
    }

    public function destroyImg($id)
    {
        $image = Image::findOrFail($id);
        if (File::exists(public_path($image->path))) {
            File::delete(public_path($image->path));
        }
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully..']);
    }

    public function destroyVideo($id)
    {
        $video = Video::findOrFail($id);
        if (File::exists(public_path($video->path))) {
            File::delete(public_path($video->path));
        }
        $video->delete();

        return response()->json(['message' => 'Video deleted successfully..']);
    }

}
