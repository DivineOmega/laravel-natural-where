<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class Contains implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'contains',
            'has in it',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, 'LIKE', '%'.$value.'%');
    }
}