<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class Equals implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'equals',
            'equal to',
            'is equal to',
            'is the same as',
            'same as',
            'is exactly',
            'is exactly the same as',
            'identical to',
            'is identical to',
            '=',
            '==',
        ];
    }

    public function handle(Builder $query, $field, $value): Builder
    {
        return $query->where($field, '=', $value);
    }
}