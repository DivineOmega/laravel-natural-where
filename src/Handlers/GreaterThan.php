<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class GreaterThan implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            '>',
            'greater than',
            'is greater than',
            'greater than (exclusive)',
            'exclusively greater than',
            'more than',
            'higher than',
            'bigger than',
            'after',
            'is after',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '>', $value);
    }
}