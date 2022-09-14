<?php

declare(strict_types=1);

namespace Tests\CoffeeMachine\Domain;

use CoffeeMachine\Domain\CoffeeMachine;
use CoffeeMachine\Domain\CoffeeMachineDrinkType;
use CoffeeMachine\Domain\CoffeeMachineSugar;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use CoffeeMachine\Infrastructure\DrinkMakerAdapter;
use PHPUnit\Framework\TestCase;

final class DrinkMakerAdapterTest extends TestCase
{
    private DrinkMakerAdapter $drinkMaker;

    protected function setUp(): void
    {
        $this->drinkMaker = $this->getMockBuilder(DrinkMakerAdapter::class)
                                ->onlyMethods(['execute'])
                                ->getMock();
    }

    public function test_make_drink_with_sugar_command_correctly(): void
    {
        $drinkType = new CoffeeMachineDrinkType(DrinkMakerInterface::DRINK_TYPE_COFFEE);
        $sugar = new CoffeeMachineSugar(1);

        $coffeeMachine = new CoffeeMachine($drinkType, $sugar);

        $command = $drinkType->value() . ':' . $sugar->value() . ':0';

        $this->drinkMaker->expects($this->once())->method('execute')->with($command);

        $this->drinkMaker->make($coffeeMachine);
    }

    public function test_make_drink_without_sugar_command_correctly(): void
    {
        $drinkType = new CoffeeMachineDrinkType(DrinkMakerInterface::DRINK_TYPE_COFFEE);
        $sugar = new CoffeeMachineSugar(0);

        $coffeeMachine = new CoffeeMachine($drinkType, $sugar);

        $command = $drinkType->value() . '::';

        $this->drinkMaker->expects($this->once())->method('execute')->with($command);

        $this->drinkMaker->make($coffeeMachine);
    }

    public function test_message_command_correctly(): void
    {
        $message = "Test message";

        $command = 'M:' . $message;

        $this->drinkMaker->expects($this->once())->method('execute')->with($command);

        $this->drinkMaker->message($message);
    }
}
