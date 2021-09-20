<?php

class Creditcard extends PaymentMethods
{
    private array $guns;

    public function __construct(array $guns)
    {
        $this->guns = $guns;
    }

    public function getInfo(): bool
    {
        $name = readline('Enter your name: ');

        $creditcardNr = readline("Enter your credit card number: ");
        if (strlen($creditcardNr) !== 16)
        {
            echo "Invalid credit card number!".PHP_EOL;
            return false;
        }

        $cvc = readline("Enter 3 numbers on the back of the card: ");
        if (strlen($cvc) !== 3)
        {
            echo "Invalid cvc!".PHP_EOL;
            return false;
        }

        return true;
    }

    public function payForGun($gunNr): void
    {
        if ($this->getInfo() === true)
        {
            echo "You bought {$this->guns[$gunNr]->getName()}".PHP_EOL;
        }
    }
}