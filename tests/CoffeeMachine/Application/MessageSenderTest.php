<?php
namespace Tests\CoffeeMachine\Application;

use CoffeeMachine\Application\MessageSender;
use CoffeeMachine\Domain\Interfaces\DrinkMakerInterface;
use PHPUnit\Framework\TestCase;

final class MessageSenderTest extends TestCase
{
    private MessageSender $sender;
    private DrinkMakerInterface $drinkMaker;

    protected function setUp(): void
    {
        $this->drinkMaker = $this->createMock(DrinkMakerInterface::class);
        $this->sender = new MessageSender($this->drinkMaker);
    }

    public function test_message_correctly(): void
    {
        $message = 'test message';

        $this->drinkMaker->expects($this->once())
                    ->method('message')
                    ->with($message);

        $this->sender->__invoke($message);
    }
}