<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class LessThanOrEquals implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            '>',
            'less than or equal to',
            'is less than or equal to',
            'less than (inclusive)',
            'inclusively less than',
            'less than or equal to',
            'lower than or equal to',
            'smaller than or equal to',
            'before or equal to',
            'is before or equal to',
            'less than or the same as',
            'is less than or the same as',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '<=', $value);
    }
}