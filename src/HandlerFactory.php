<?php

namespace DivineOmega\LaravelNaturalWhere;

use DivineOmega\LaravelNaturalWhere\Handlers\Contains;
use DivineOmega\LaravelNaturalWhere\Interfaces\HandlerInterface;

class HandlerFactory
{
    private $operator;

    private $handlers = [
        Contains::class,
    ];

    public function __construct(string $operator)
    {
        $this->operator = strtolower($operator);
    }

    public function getHandler()
    {
        $similarityToHandlerMap = [];

        foreach ($this->handlers as $handler) {
            /** @var HandlerInterface $handler */
            foreach ($handler->getPhrases() as $phrase) {
                $similarity = similar_text($this->operator, $phrase);
                $similarityToHandlerMap[$similarity] = $handler;
            }
        }

        $similarities = array_keys($similarityToHandlerMap);
        $highestSimilarity = max($similarities);

        $handler = $similarityToHandlerMap[$highestSimilarity];

        return $handler;
    }
}