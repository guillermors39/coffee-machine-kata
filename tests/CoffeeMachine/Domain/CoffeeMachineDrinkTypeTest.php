<?php

declare(strict_types=1);

namespace Tests\CoffeeMachine\Domain;

use CoffeeMachine\Domain\CoffeeMachineDrinkType;
use CoffeeMachine\Domain\Exceptions\CoffeeMachineDrinkTypeNotFoundException;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use PHPUnit\Framework\TestCase;

final class CoffeeMachineDrinkTypeTest extends TestCase
{
    public function test_initialization(): void
    {
        $drinkType = new CoffeeMachineDrinkType(DrinkMakerInterface::DRINK_TYPE_COFFEE);
        $this->assertEquals(DrinkMakerInterface::DRINK_TYPE_COFFEE, $drinkType->value());
    }

    public function test_drink_types_execption(): void
    {
        $this->expectException(CoffeeMachineDrinkTypeNotFoundException::class);
        new CoffeeMachineDrinkType('asd');
    }

    public function test_drink_types_exception_code(): void
    {
        $this->expectExceptionCode(404);
        new CoffeeMachineDrinkType('asd');
    }

    public function test_drink_types_exception_message(): void
    {
        $this->expectExceptionMessage("The drink type entered is not available");
        new CoffeeMachineDrinkType('asd');
    }
}