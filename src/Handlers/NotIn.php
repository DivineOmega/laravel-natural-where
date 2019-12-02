<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;
use InvalidArgumentException;

class NotIn implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'not in',
            'not in the list',
            'not one of',
            'is not one of',
            'is not in',
            'is not in the list',
            'is not one of the following',
            'is not one of the following items',
        ];
    }

    public function handle(Builder $query, $field, $value): Builder
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        return $query->whereNotIn($field, $value);
    }
}