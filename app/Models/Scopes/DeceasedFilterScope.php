<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class DeceasedFilterScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where(
            fn(Builder $query) => $query
                ->when(request()->has('from_birthday'), fn(Builder $query) => $query
                    ->where('date_birthday', '>=', request()->date('from_birthday')))
                ->when(request()->has('to_birthday'), fn(Builder $query) => $query
                    ->where('date_birthday', '<=', request()->date('to_birthday'))),
        )
            ->where(
                fn(Builder $query) => $query
                    ->when(request()->has('from_death'), fn(Builder $query) => $query
                        ->where('date_death', '>=', request()->date('from_death')))
                    ->when(request()->has('to_death'), fn(Builder $query) => $query
                        ->where('date_death', '<=', request()->date('to_death'))),
            )
            ->when(request()->has('fio'), fn(Builder $query) => $query
                ->where('fio', 'LIKE', '%' . request()->string('fio') . '%'),
            );
    }
}
