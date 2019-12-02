<?php

namespace DivineOmega\LaravelNaturalWhere\Interfaces;

use Illuminate\Database\Query\Builder;

interface HandlerInterface
{
    public function getPhrases(): array;
    public function handle(Builder $query, $field, $value): Builder;
}