<?php

namespace DivineOmega\LaravelNaturalWhere;

use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        Builder::macro('naturalWhere', function($field, $operator, $value) {
            switch ($operator) {
                case 'contains':
                    return $this->where($field, 'LIKE', '%'.$value.'%');

                case 'equals':
                case 'equal to':
                case 'is':
                    return $this->where($field, '=', $value);

                case 'not equals':
                case 'not equal to':
                case 'is not':
                    return $this->where($field, '!=', $value);

                default:
                    throw new Exception('Unable to identify natural language operator.');
            }
        });
    }
}