<?php

class SavingsAccount
{
    private int $annualInterest;
    private int $balance;

    public function __construct(int $annualInterest, float $balance)
    {
        $this->annualInterest = $annualInterest;
        $this->balance = $balance;
    }

    public function withdraw(int $withdrawAmount): void
    {
        $this->balance = $this->balance - $withdrawAmount;
    }

    public function deposit(int $depositAmount): void
    {
        $this->balance = $this->balance + $depositAmount;
    }

    public function addInterest(): float
    {
        $interestEarned = $this->balance * ($this->annualInterest/12);
        $this->balance = $this->balance + $this->balance * ($this->annualInterest/12);

        return $interestEarned;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}

$balance = (int) readline("How much money is in the account?: ");
$interest = (int) readline("Enter the annual interest rate: ");
$months = (int) readline("How long has the account been opened?: ");

$account = new SavingsAccount($interest, $balance);
$totalDeposits = 0;
$totalWithdrawals = 0;
$totalInterest = 0;
for ($i = 1; $i <= $months; $i++)
{
    $deposit = (int) readline("Enter amount deposited for month $i: ");
    $totalDeposits = $totalDeposits + $deposit;
    $account->deposit($deposit);

    $withdraw = (int) readline("Enter amount withdrawn for month $i: ");
    $totalWithdrawals = $totalWithdrawals + $withdraw;
    $account->withdraw($withdraw);

    $totalInterest = $totalInterest + $account->addInterest();
}
echo "Total deposited: ".$totalDeposits."$".PHP_EOL;
echo "Total withdrawn: ".$totalWithdrawals."$".PHP_EOL;
echo "Total interest: ".$totalInterest."$".PHP_EOL;
echo "Final balance: ".$account->getBalance()."$".PHP_EOL;
