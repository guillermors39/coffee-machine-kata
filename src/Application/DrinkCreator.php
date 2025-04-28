<?php
namespace CoffeeMachine\Application;

use CoffeeMachine\Domain\CoffeeMachine;
use CoffeeMachine\Domain\CoffeeMachineDrinkType;
use CoffeeMachine\Domain\CoffeeMachineSugar;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;

final class DrinkCreator
{
    private DrinkMakerInterface $drinkMaker;

    public function __construct(DrinkMakerInterface $drinkMaker)
    {
        $this->drinkMaker = $drinkMaker;
    }

    public function __invoke(string $drinkType, int $sugarQty)
    {
        $drinkType = new CoffeeMachineDrinkType($drinkType);
        $sugar = new CoffeeMachineSugar($sugarQty);

        $coffeeMachine = new CoffeeMachine($drinkType, $sugar);

        $this->drinkMaker->make($coffeeMachine);
    }
}