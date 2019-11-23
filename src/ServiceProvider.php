<?php

namespace DivineOmega\LaravelNaturalWhere;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        Builder::macro('naturalWhere', function($field, $operator, $value) {
            /** @var Builder $this */
            return (new HandlerFactory($operator))
                ->getHandler()
                ->handle($this, $field, $value);
        });

        Builder::macro('naturalOrWhere', function($field, $operator, $value) {
            /** @var Builder $this */
            $this->orWhere(function ($query) use ($field, $operator, $value) {
                $query->naturalWhere($field, $operator, $value);
            });
        });
    }
}