<?php

class Buyer
{
    private int $money;
    private array $licenses;

    public function __construct(int $money, array $licenses)
    {

        $this->money = $money;
        $this->licenses = $licenses;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function getLicenses(): array
    {
        return $this->licenses;
    }

    public function setMoney(int $money): void
    {
        $this->money = $this->money - $money;
    }
}