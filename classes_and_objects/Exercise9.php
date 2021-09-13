<?php

class BankAccount
{
    private string $accountName;
    private float $balance;

    public function __construct(string $accountName, float $balance)
    {

        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public function showUserBalance()
    {
        if ($this->balance < 0)
        {
            return $this->accountName.", -$".number_format(abs($this->balance),2).PHP_EOL;
        }

        return $this->accountName.", $".number_format($this->balance,2).PHP_EOL;
    }
}

$benson = new BankAccount("Benson", -17.50);
echo $benson->showUserBalance();