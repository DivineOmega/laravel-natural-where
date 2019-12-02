<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;

class DoesNotContain implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'does not contain',
            'doesn\'t contain',
            'does not contain the word',
            'does not contain the letter',
            'does not have in it',
            'excludes the word',
            'excludes the letter',
        ];
    }

    public function handle(Builder $query, $field, $value): Builder
    {
        return $query->where($field, 'NOT LIKE', '%'.$value.'%');
    }
}