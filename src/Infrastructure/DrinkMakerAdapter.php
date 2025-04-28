<?php
namespace CoffeeMachine\Infrastructure;

use CoffeeMachine\Domain\CoffeeMachine;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use CoffeeMachine\DrinkMaker;

class DrinkMakerAdapter implements DrinkMakerInterface
{
    public function make(CoffeeMachine $coffeeMachine): void
    {
        $protocol = [
            $coffeeMachine->drinkType()->value(),
            $coffeeMachine->sugarQty()->value() > 0 ? $coffeeMachine->sugarQty()->value() : '',
            $coffeeMachine->sugarQty()->value() > 0 ? '0' : '',
        ];

        $command = implode(':', $protocol);

        $this->execute($command);
    }

    public function message(string $message): void
    {
        $command = 'M:' . $message;

        $this->execute($command);
    }

    public function execute(string $command): void
    {
        DrinkMaker::execute($command);
    }
}