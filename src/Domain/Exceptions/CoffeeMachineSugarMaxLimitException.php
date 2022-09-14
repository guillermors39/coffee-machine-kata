<?php
namespace CoffeeMachine\Domain\Exceptions;

use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use Exception;

final class CoffeeMachineSugarMaxLimitException extends Exception
{
    public function __construct()
    {
        $message = "The sugar quantity must be lower or equals to " . DrinkMakerInterface::MAX_SUGAR_LIMIT;
        return parent::__construct($message, 403);
    }
}