<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilteredInfoResource;
use App\Models\InfoTheDeceased;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilteredInfoTheDeceasedController extends Controller
{
    public function filter(Request $request)
    {
        $filtered = InfoTheDeceased::query()
            ->where(
                fn(Builder $query) => $query
                    ->when($request->has('from_birthday'), fn(Builder $query) => $query
                        ->where('date_birthday', '>=', $request->date('from_birthday')))
                    ->when($request->has('to_birthday'), fn(Builder $query) => $query
                        ->where('date_birthday', '<=', $request->date('to_birthday')))
            )
            ->where(
                fn(Builder $query) => $query
                    ->when($request->has('from_death'), fn(Builder $query) => $query
                        ->where('date_death', '>=', $request->date('from_death')))
                    ->when($request->has('to_death'), fn(Builder $query) => $query
                        ->where('date_death', '<=', $request->date('to_death')))
            )
            ->where('fio', 'LIKE', '%' . $request->string('fio') . '%')
            ->get();

        return response()->json(new FilteredInfoResource($filtered));
    }
}
