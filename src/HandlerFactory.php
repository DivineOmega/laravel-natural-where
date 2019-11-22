<?php

namespace DivineOmega\LaravelNaturalWhere;

use DivineOmega\LaravelNaturalWhere\Handlers\Between;
use DivineOmega\LaravelNaturalWhere\Handlers\BetweenExclusive;
use DivineOmega\LaravelNaturalWhere\Handlers\Contains;
use DivineOmega\LaravelNaturalWhere\Handlers\DoesNotContain;
use DivineOmega\LaravelNaturalWhere\Handlers\Equals;
use DivineOmega\LaravelNaturalWhere\Handlers\GreaterThan;
use DivineOmega\LaravelNaturalWhere\Handlers\GreaterThanOrEquals;
use DivineOmega\LaravelNaturalWhere\Handlers\In;
use DivineOmega\LaravelNaturalWhere\Handlers\NotIn;
use DivineOmega\LaravelNaturalWhere\Handlers\LessThan;
use DivineOmega\LaravelNaturalWhere\Handlers\LessThanOrEquals;
use DivineOmega\LaravelNaturalWhere\Handlers\NotEquals;
use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;

class HandlerFactory
{
    private $operator;

    private $handlerClasses = [
        Contains::class,
        DoesNotContain::class,
        Equals::class,
        NotEquals::class,
        GreaterThan::class,
        GreaterThanOrEquals::class,
        LessThan::class,
        LessThanOrEquals::class,
        In::class,
        NotIn::class,
        Between::class,
        BetweenExclusive::class,
    ];

    public function __construct(string $operator)
    {
        $this->operator = strtolower($operator);
    }

    public function getHandler()
    {
        $similarityToHandlerMap = [];

        foreach ($this->handlerClasses as $handlerClass) {
            /** @var HandlerInterface $handler */
            $handler = new $handlerClass;

            foreach ($handler->getPhrases() as $phrase) {
                similar_text($this->operator, $phrase, $similarity);
                $similarityToHandlerMap[(string) $similarity] = $handler;
            }
        }

        $similarities = array_keys($similarityToHandlerMap);
        $highestSimilarity = max($similarities);

        $handler = $similarityToHandlerMap[$highestSimilarity];
        
        return $handler;
    }
}