<?php
namespace CoffeeMachine\Domain\Interfaces;

use CoffeeMachine\Domain\CoffeeMachine;

interface DrinkMakerInterface
{
    const DRINK_TYPE_COFFEE    = 'C';
    const DRINK_TYPE_TEA       = 'T';
    const DRINK_TYPE_CHOCOLATE = 'H';
    const AVAILABLE_DRINK_TYPES = [self::DRINK_TYPE_TEA, self::DRINK_TYPE_COFFEE, self::DRINK_TYPE_CHOCOLATE];

    const MAX_SUGAR_LIMIT = 2;

    public function make(CoffeeMachine $coffeeMachine): void;

    public function message(string $message): void;

    public function execute(string $command): void;
}