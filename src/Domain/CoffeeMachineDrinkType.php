<?php
namespace CoffeeMachine\Domain;

use CoffeeMachine\Domain\Exceptions\CoffeeMachineDrinkTypeNotFoundException;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;

final class CoffeeMachineDrinkType extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValidType($value);
        parent::__construct($value);
    }

    private function ensureIsValidType(string $value): void
    {
        if (!in_array($value, DrinkMakerInterface::AVAILABLE_DRINK_TYPES)) {
            throw new CoffeeMachineDrinkTypeNotFoundException;
        }
    }
}