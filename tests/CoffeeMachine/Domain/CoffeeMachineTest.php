<?php

declare(strict_types=1);

namespace Tests\CoffeeMachine\Domain;

use CoffeeMachine\Domain\CoffeeMachine;
use CoffeeMachine\Domain\CoffeeMachineDrinkType;
use CoffeeMachine\Domain\CoffeeMachineSugar;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use PHPUnit\Framework\TestCase;

final class CoffeeMachineTest extends TestCase
{
    public function test_set_up_correctly(): void
    {
        $drinkType = new CoffeeMachineDrinkType(DrinkMakerInterface::DRINK_TYPE_COFFEE);
        $sugar = new CoffeeMachineSugar(1);

        $coffeeMachine = new CoffeeMachine($drinkType, $sugar);

        $this->assertEquals($coffeeMachine->drinkType()->value(), DrinkMakerInterface::DRINK_TYPE_COFFEE);
        $this->assertEquals($coffeeMachine->sugarQty()->value(), 1);
    }
}
