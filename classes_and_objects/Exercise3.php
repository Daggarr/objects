<?php

class FuelGauge
{
    private int $currentFuel;

    public function __construct(int $currentFuel)
    {
        $this->currentFuel = $currentFuel;
    }

    public function increaseLiters(): void
    {
        if ($this->currentFuel < 70)
        {
            $this->currentFuel++;
        }
    }

    public function decreaseLiters(): void
    {
        if ($this->currentFuel > 0)
        {
            $this->currentFuel--;
        }
    }

    public function getCurrentFuel(): int
    {
        return $this->currentFuel;
    }
}

class Odometer extends FuelGauge
{
    private int $mileage;
    private int $kilometersTraveled;

    public function __construct(int $currentFuel, int $mileage)
    {
        parent::__construct($currentFuel);
        $this->mileage = $mileage;
        $this->kilometersTraveled = 0;
    }

    public function increaseMileage():void
    {
        $this->mileage++;
        $this->kilometersTraveled++;

        if ($this->mileage > 999)
        {
            $this->mileage = 0;
        }

        if ($this->kilometersTraveled % 10 === 0)
        {
            $this->decreaseLiters();
        }
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }
}

$odometer = new Odometer(0, 789);

for ($i = 0; $i < 9; $i++)
{
    $odometer->increaseLiters();
}

while($odometer->getCurrentFuel() > 0)
{
    echo $odometer->getMileage().PHP_EOL;
    echo $odometer->getCurrentFuel().PHP_EOL;

    $odometer->increaseMileage();
}