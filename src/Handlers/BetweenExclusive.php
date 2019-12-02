<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;
use InvalidArgumentException;

class BetweenExclusive implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'between but not including',
            'between and excluding',
            'between exclusively',
            'is between but not including',
            'is between the values but not including',
            'is between these two values but not including',
            'is exclusively between',
        ];
    }

    public function handle(Builder $query, $field, $value): Builder
    {
        if (!is_array($value) || count($value) !== 2) {
            throw new InvalidArgumentException('The value passed must be an array of 2 items.');
        }

        return $query->where(function ($query) use ($field, $value) {
            $query->where($field, '>', $value[0]);
            $query->where($field, '<', $value[1]);
        });
    }
}