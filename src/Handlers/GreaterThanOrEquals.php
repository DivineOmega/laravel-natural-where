<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class GreaterThanOrEquals implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            '>',
            'greater than or equal to',
            'is greater than or equal to',
            'greater than (inclusive)',
            'inclusively greater than',
            'more than or equal to',
            'higher than or equal to',
            'bigger than or equal to',
            'after or equal to',
            'is after or equal to',
            'greater than or the same as',
            'is greater than or the same as',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '>=', $value);
    }
}