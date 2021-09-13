<?php

require_once 'weapon.php';

class Rifle extends Weapon
{
    private string $license = "RCL";

    public function calculateTrajectory(): float
    {
        return 4 * 16 / 5;
    }

    public function getLicense(): string
    {
        return $this->license;
    }
}