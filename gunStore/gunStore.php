<?php

class GunStore
{
    protected array $guns;

    public function __construct()
    {
        $this->guns = [];
    }

    public function addHandgun(Handgun $handgun): void
    {
        $this->guns[] = $handgun;
    }

    public function addRifle(Rifle $rifle): void
    {
        $this->guns[] = $rifle;
    }

    public function displayGuns(): void
    {
        foreach ($this->guns as $key => $gun)
        {
            echo "[$key] ".$gun->getName().", $".$gun->getPrice()." Bullet trajectory: ".$gun->calculateTrajectory().PHP_EOL;
        }
    }

    public function paymentMethods()
    {
        $gunNr = readline("Enter number of which gun you would like to buy: ");

        $paymentMethods = [new Cash($this->guns), new Creditcard($this->guns), new Paypal($this->guns)];

        echo "[0] cash".PHP_EOL;
        echo "[1] credit card".PHP_EOL;
        echo "[2] paypal".PHP_EOL;

        $paymentMethod = readline("How would you like to pay?:");
        if (array_key_exists($paymentMethod, $paymentMethods) === true)
        {
            $paymentMethod = (int) $paymentMethod;
            $paymentMethods[$paymentMethod]->payForGun($gunNr);
        }
        else
        {
            echo "Invalid payment method!".PHP_EOL;
        }
    }
}
