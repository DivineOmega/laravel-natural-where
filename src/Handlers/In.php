<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;
use InvalidArgumentException;

class In implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'in',
            'in the list',
            'one of',
            'is one of',
            'is in',
            'is in the list',
            'is one of the following',
            'is one of the following items',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        return $query->whereIn($field, $value);
    }
}