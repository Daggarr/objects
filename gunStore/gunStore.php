<?php

class GunStore
{
    private array $guns;
    private Buyer $customer;

    public function __construct(Buyer $customer)
    {
        $this->guns = [];
        $this->customer = $customer;
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

    public function buyGun(int $gunNr)
    {
        if ($this->guns[$gunNr]->getPrice() < $this->customer->getMoney()
            && in_array($this->guns[$gunNr]->getLicense(), $this->customer->getLicenses()))
        {
            echo "You bought {$this->guns[$gunNr]->getName()}".PHP_EOL;
            $this->customer->setMoney($this->guns[$gunNr]->getPrice());
        }
        else
        {
            echo "You can't buy that gun!".PHP_EOL;
        }
    }
}
