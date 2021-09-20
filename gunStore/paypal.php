<?php

class Paypal extends PaymentMethods
{
    private array $guns;

    public function __construct(array $guns)
    {
        $this->guns = $guns;
    }

    public function getInfo(): bool
    {
        $email = readline('Enter your email: ');
        if (strpos($email,'@') === false)
        {
            echo "Invalid email!".PHP_EOL;
            return false;
        }

        $password = readline("Enter your password: ");

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