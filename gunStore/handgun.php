<?php

require_once 'weapon.php';

class Handgun extends Weapon
{
    private string $license = "HCL";

    public function calculateTrajectory(): float
    {
        return 4 * 6 / 3;
    }

    public function getLicense(): string
    {
        return $this->license;
    }
}