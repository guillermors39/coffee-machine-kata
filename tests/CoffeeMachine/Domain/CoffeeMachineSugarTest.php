<?php

declare(strict_types=1);

namespace Tests\CoffeeMachine\Domain;

use CoffeeMachine\Domain\CoffeeMachineSugar;
use CoffeeMachine\Domain\Exceptions\CoffeeMachineSugarMaxLimitException;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use PHPUnit\Framework\TestCase;

final class CoffeeMachineSugarTest extends TestCase
{
    public function test_initialization(): void
    {
        $sugar = new CoffeeMachineSugar(DrinkMakerInterface::MAX_SUGAR_LIMIT);
        $this->assertEquals(DrinkMakerInterface::MAX_SUGAR_LIMIT, $sugar->value());
    }

    public function test_max_sugar_quantity_exception(): void
    {
        $this->expectException(CoffeeMachineSugarMaxLimitException::class);
        new CoffeeMachineSugar(DrinkMakerInterface::MAX_SUGAR_LIMIT + 1);
    }

    public function test_max_sugar_quantity_exception_code(): void
    {
        $this->expectExceptionCode(403);
        new CoffeeMachineSugar(DrinkMakerInterface::MAX_SUGAR_LIMIT + 1);
    }

    public function test_max_sugar_quantity_exception_message(): void
    {
        $this->expectExceptionMessage("The sugar quantity must be lower or equals to " . DrinkMakerInterface::MAX_SUGAR_LIMIT);
        new CoffeeMachineSugar(DrinkMakerInterface::MAX_SUGAR_LIMIT + 1);
    }
}