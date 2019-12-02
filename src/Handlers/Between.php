<?php

namespace DivineOmega\LaravelNaturalWhere\Handlers;

use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;
use Illuminate\Database\Query\Builder;
use InvalidArgumentException;

class Between implements HandlerInterface
{
    public function getPhrases(): array
    {
        return [
            'between',
            'between and including',
            'between inclusively',
            'is between',
            'is between the values',
            'is between these two values',
            'is inclusively between',
        ];
    }

    public function handle(Builder $query, $field, $value): Builder
    {
        if (!is_array($value) || count($value) !== 2) {
            throw new InvalidArgumentException('The value passed must be an array of 2 items.');
        }

        return $query->where(function ($query) use ($field, $value) {
            $query->where($field, '>=', $value[0]);
            $query->where($field, '<=', $value[1]);
        });
    }
}