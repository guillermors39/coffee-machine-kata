# Introduction

In this Coffee Machine Project, your task is to implement the logic (starting
from a simple class) that translates orders from customers of the coffee machine
to the drink maker. Your code will use the drink maker protocol to send commands
to the drink maker.

This project is better implemented if using TDD (Test Driven Development).

---

# First iteration - _Making drinks_

In this iteration, your task is to implement the logic (starting from a simple
class) that translates orders from customers of the coffee machine to the drink
maker. Your code will use the drink maker protocol (see below) to send commands
to the drink maker.

The coffee machine can serve 3 type of drinks: _tea_, _coffee_, _chocolate_.

## Use cases

Your product owner has delivered the stories and here they are:

- The drink maker should receive the correct instructions for my coffee / tea /
  chocolate order
- I want to be able to send instructions to the drink maker to add one or two
  sugars
- When my order contains sugar the drink maker should add a stick with it

## Drink maker protocol

The drink maker receives string commands **from your code** to make the drinks.
It can also deliver info messages to the customer if ordered so. The
instructions it receives follow this format:

- "T:1:0" (Drink maker makes 1 tea with 1 sugar and a stick)
- "H::" (Drink maker makes 1 chocolate with no sugar - and therefore no stick)
- "C:2:0" (Drink maker makes 1 coffee with 2 sugars and a stick)
- "M:message-content" (Drink maker forwards any message received onto the coffee
  machine interface for the customer to see)

## Implementation details

You can represent the incoming order of the customer as you wish. For instance,
it could be a simple plain object that contains the order details, or a simple
String, try to think of the simplest thing that do the job. Complex matters will
arrive soon enough, trust us.

## How to run the project

You can use the Makefile to run the project:

* `make build` to build the docker image
* `make test` to run the tests
* `make debug` to run the project in debug mode
* `make clean` to clean the project

