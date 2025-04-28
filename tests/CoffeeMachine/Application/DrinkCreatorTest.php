<?php

declare(strict_types=1);

namespace Tests\CoffeeMachine;

use CoffeeMachine\Application\DrinkCreator;
use CoffeeMachine\Domain\CoffeeMachine;
use CoffeeMachine\Domain\CoffeeMachineDrinkType;
use CoffeeMachine\Domain\CoffeeMachineSugar;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use PHPUnit\Framework\TestCase;

final class DrinkCreatorTest extends TestCase
{
    private DrinkCreator $creator;
    private DrinkMakerInterface $drinkMaker;

    protected function setUp(): void
    {
        $this->drinkMaker = $this->createMock(DrinkMakerInterface::class);
        $this->creator = new DrinkCreator($this->drinkMaker);
    }

    public function test_make_drink_with_sugar_correctly(): void
    {
        $drinkType = DrinkMakerInterface::DRINK_TYPE_COFFEE;
        $sugarQty = 1;
        
        $this->drinkMaker->expects($this->once())
                        ->method('make')
                        ->with(new CoffeeMachine(new CoffeeMachineDrinkType($drinkType), new CoffeeMachineSugar($sugarQty)));

        $this->creator->__invoke($drinkType, $sugarQty);
    }

    public function test_make_drink_without_sugar_correctly(): void
    {
        $drinkType = DrinkMakerInterface::DRINK_TYPE_COFFEE;
        $sugarQty = 0;
        
        $this->drinkMaker->expects($this->once())
                        ->method('make')
                        ->with(new CoffeeMachine(new CoffeeMachineDrinkType($drinkType), new CoffeeMachineSugar($sugarQty)));

        $this->creator->__invoke($drinkType, $sugarQty);
    }
}