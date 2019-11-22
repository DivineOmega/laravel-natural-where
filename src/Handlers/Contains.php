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
            'contains the word',
            'contains the letter',
            'has in it',
            'includes the word',
            'includes the letter',
        ];
    }

    public function handle(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, 'LIKE', '%'.$value.'%');
    }
}