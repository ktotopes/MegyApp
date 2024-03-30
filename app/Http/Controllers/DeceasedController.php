<?php

namespace App\Http\Controllers;

use App\Enum\BlocksType;
use App\Http\Controllers\Traits\UploadFilesTrait;
use App\Http\Requests\DeceasedRequest;
use App\Http\Resources\DeceasedResource;
use App\Models\Block;
use App\Models\Deceased;
use App\Models\Image;
use App\Models\Video;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DeceasedController extends Controller
{
    use UploadFilesTrait;

    public function index(Request $request)
    {
        $filtered = Deceased::query()
            ->where(
                fn(Builder $query) => $query
                    ->when($request->has('from_birthday'), fn(Builder $query) => $query
                        ->where('date_birthday', '>=', $request->date('from_birthday')))
                    ->when($request->has('to_birthday'), fn(Builder $query) => $query
                        ->where('date_birthday', '<=', $request->date('to_birthday'))),
            )
            ->where(
                fn(Builder $query) => $query
                    ->when($request->has('from_death'), fn(Builder $query) => $query
                        ->where('date_death', '>=', $request->date('from_death')))
                    ->when($request->has('to_death'), fn(Builder $query) => $query
                        ->where('date_death', '<=', $request->date('to_death'))),
            )
            ->where('fio', 'LIKE', '%' . $request->string('fio') . '%')
            ->get();

        return response()->json(new DeceasedResource($filtered));
    }

    public function show(Deceased $deceased)
    {
        return response()->json(
            (new DeceasedResource($deceased->load('blocks.texts', 'blocks.images', 'blocks.videos'))),
        );
    }

    public function update(DeceasedRequest $request)
    {
        if (!($deceased = deceased())) {
            abort(404, 'Deceased not found');
        }

        DB::transaction(function () use ($request, $deceased) {
            $deceased->update([
                ...Arr::except($request->validated(), 'blocks'),
                'date_death' => $request->date('date_death'),
                'date_birthday' => $request->date('date_birthday'),
            ]);

            $deceased->clearGarbage();

            foreach ($request->blocks as $block) {
                $b = $deceased->blocks()->create(['type' => $block['type']]);

                $key = "{$b->type}s";

                foreach ($block[$key] as $item) {
                    if ($item['item'] instanceof UploadedFile) {
                        $fileName = now()->format('Y-m-d_H-i-s') . '_' . $item['item']->getClientOriginalName() . '.' . $item['item']->getClientOriginalExtension();
                        //    $item->storeAs(
                        //        "storage/$key/",
                        //        $fileName,
                        //    );
                        $data = [
                            'path' => "storage/{$key}/{$fileName}",
                        ];

                        if ($b->type === BlocksType::Image->value) {
                            $data['description'] = $item['description'] ?? '';
                        }

                    } else {
                        $data = [
                            'text' => $item['item'],
                        ];
                    }

                    $b->$key()->create($data);
                }
            }
        });

        //qrCodeCreate();

        return response()->json(['message' => 'InfoTheDeceased updated successfully..']);
    }

    public function imageDelete(Block $block, Image $image)
    {
        if (!deceased()->blocks->contains($block) || !$block->images->contains($image)) {
            abort(404, 'Image not found');
        }

        $image->delete();


        return response()->json(['message' => 'Image deleted successfully.']);
    }

    public function videoDelete(Block $block, Video $video)
    {
        if (!deceased()->blocks->contains($block) || !$block->videos->contains($video)) {
            abort(404, 'Video not found');
        }

        $video->delete();


        return response()->json(['message' => 'Video deleted successfully.']);
    }
}
