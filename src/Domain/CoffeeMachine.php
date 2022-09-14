<?php

declare(strict_types=1);

namespace CoffeeMachine\Domain;

use CoffeeMachine\Domain\Exceptions\CoffeeMachineDrinkTypeNotFoundException;
use CoffeeMachine\Domain\Exceptions\CoffeeMachineSugarMaxLimitException;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;

final class CoffeeMachine
{
    private CoffeeMachineDrinkType $drinkType;
    private CoffeeMachineSugar $sugar;

    public function __construct (CoffeeMachineDrinkType $drinkType, CoffeeMachineSugar $sugar)
    {
        $this->drinkType = $drinkType;
        $this->sugar = $sugar;
    }

    public function drinkType(): CoffeeMachineDrinkType
    {
        return $this->drinkType;
    }

    public function sugarQty(): CoffeeMachineSugar
    {
        return $this->sugar;
    }
}
