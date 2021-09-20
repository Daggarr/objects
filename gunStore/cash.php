<?php
require_once 'paymentMethods.php';

class Cash extends PaymentMethods
{
    private array $guns;

    public function __construct(array $guns)
    {
        $this->guns = $guns;
    }

    public function getInfo(): int
    {
        return (int) readline("Enter the amount of cash you have: ");
    }

    public function payForGun($gunNr): void
    {
        if ($this->getInfo()<$this->guns[$gunNr]->getPrice())
        {
            echo "You can't buy this gun!".PHP_EOL;
        }
        else
        {
            echo "You bought {$this->guns[$gunNr]->getName()}".PHP_EOL;
        }
    }
}