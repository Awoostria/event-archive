<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  Builder<Model>  $builder
     * @return Builder<Model>
     */
    public function apply(Builder $builder, Model $model): Builder
    {
        /** @phpstan-ignore-next-line */
        return $builder->ordered();
    }
}
