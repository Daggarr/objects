<?php

class EnergyDrinkers
{
    private int $customers;
    private int $percentEnergyDrinkers;
    private int $percentPrefersCitrus;

    public function __construct(int $customers, int $percentEnergyDrinkers, int $percentPrefersCitrus)
    {
       $this->customers = $customers;
       $this->percentEnergyDrinkers = $percentEnergyDrinkers;
       $this->percentPrefersCitrus = $percentPrefersCitrus;
    }

    public function energyCount(): float
    {
        $energyCount = $this->customers * ($this->percentEnergyDrinkers/100);
        return $energyCount;
    }

    public function preferCitrus(): float
    {
        $energyDrinkers = $this->energyCount();
        $preferCitrus = $energyDrinkers * ($this->percentPrefersCitrus/100);
        return $preferCitrus;
    }

    public function getCustomers(): int
    {
        return $this->customers;
    }
}

$energyDrinkers = new EnergyDrinkers(12467, 14, 64);

echo "Total number of people surveyed {$energyDrinkers->getCustomers()}".PHP_EOL;
echo "Approximately {$energyDrinkers->energyCount()} bought at least one energy drink".PHP_EOL;
echo "{$energyDrinkers->preferCitrus()} of those prefer citrus flavored energy drinks".PHP_EOL;