<?php
namespace CoffeeMachine\Application;

use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;

final class MessageSender
{
    private DrinkMakerInterface $drinkMaker;

    public function __construct(DrinkMakerInterface $drinkMaker)
    {
        $this->drinkMaker = $drinkMaker;
    }

    public function __invoke(string $message)
    {
        $this->drinkMaker->message($message);
    }
}