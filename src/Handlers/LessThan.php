<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class LessThan implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            '<',
            'less than',
            'is less than',
            'less than (exclusive)',
            'exclusively less than',
            'less than',
            'lower than',
            'smaller than',
            'before',
            'is exclusively before',
            'is before',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '<', $value);
    }
}