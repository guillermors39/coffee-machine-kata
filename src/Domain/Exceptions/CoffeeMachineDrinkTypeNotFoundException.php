<?php
namespace CoffeeMachine\Domain\Exceptions;

use Exception;

final class CoffeeMachineDrinkTypeNotFoundException extends Exception
{
    public function __construct()
    {
        $message = "The drink type entered is not available";
        parent::__construct($message, 404);
    }
}