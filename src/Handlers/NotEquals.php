<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class NotEquals implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'not equals',
            'does not equal',
            'doesn\'t equal',
            'not equal to',
            'is not equal to',
            'is not the same as',
            'not same as',
            'not identical to',
            'is not identical to',
            '!=',
            '<>',
            'isn\'t',
            'is not',
            'ain\'t',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '!=', $value);
    }
}