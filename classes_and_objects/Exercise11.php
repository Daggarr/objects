<?php

class Account
{
    private string $accountName;
    private float $balance;

    public function __construct(string $accountName, float $balance)
    {

        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public function deposit(float $depositAmount): void
    {
        $this->balance += $depositAmount;
    }

    public function withdraw(float $withdrawAmount): void
    {
        $this->balance -= $withdrawAmount;
    }

    public function transferMoney(Account $account, float $transferAmount): void
    {
        $this->withdraw($transferAmount);
        $account->deposit($transferAmount);
    }

    public function displayAccountInfo(): string
    {
        return $this->accountName.", ".$this->balance.PHP_EOL;
    }
}

$a = new Account("A", 100.00);
$b = new Account("B", 0.00);
$c = new Account("C", 0.00);

$a->transferMoney($b,50.00);
$b->transferMoney($c,25.00);

echo $a->displayAccountInfo();
echo $b->displayAccountInfo();
echo $c->displayAccountInfo();