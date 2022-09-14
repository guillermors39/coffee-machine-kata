<?php
namespace CoffeeMachine\Domain;

use CoffeeMachine\Domain\Exceptions\CoffeeMachineSugarMaxLimitException;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;

final class CoffeeMachineSugar extends IntegerValueObject
{
    public function __construct(int $value)
    {
        $this->ensureIsValidQuantity($value);
        parent::__construct($value);
    }

    private function ensureIsValidQuantity(int $value): void
    {
        if ($value > DrinkMakerInterface::MAX_SUGAR_LIMIT) {
            throw new CoffeeMachineSugarMaxLimitException;
        }
    }
}