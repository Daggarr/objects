<?php
class vendingMachine
{
    public $name;
    public $price;
    public $index;

    public function __construct(int $index, string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->index = $index;
    }

}

$machineCoins = [
    200 => 5,
    100 => 3,
    50 => 6,
    20 => 5,
    10 => 8,
    5 => 7
];

$wallet = [
    200 => 1,
    100 => 1,
    50 => 2,
    20 => 2,
    10 => 4,
    5 => 3
];

$drinks = [
    new vendingMachine(0, "white coffee", 170),
    new vendingMachine(1, "espresso", 100),
    new vendingMachine(2, "tea", 120),
];

while(true)
{
    foreach ($drinks as $product)
    {
        echo $product->index . " " . $product->name . " " . number_format($product->price/100,2) . PHP_EOL;
    }

    $order = readline("Enter which drink you would like (number): ");
    if (!is_numeric($order))
    {
        echo "Enter a number!\n";
        continue;
    }
    $order =(int) $order;
    if ($order > 2 || $order < 0)
    {
        echo "Selection doesn't exist!\n";
    }

    $priceToPay = $drinks[$order]->price;
    $pricePaid = 0;

    foreach ($wallet as $coin => $amount)
    {
        echo "You have $amount $coin coins.\n";
    }

    while($pricePaid < $priceToPay)
    {
        $coin = (int) readline("Enter which coin you insert: ");

        if (array_key_exists($coin,$wallet) === false)
        {
            echo "That coin doesn't exist\n";
            continue;
        }

        if ($wallet[$coin] === 0)
        {
            echo "You don't have that coin\n";
            continue;
        }

        $pricePaid = $pricePaid + $coin;
        $wallet[$coin] = $wallet[$coin] - 1;
        echo "Currently you have inserted " . number_format($pricePaid/100,2) . "$". PHP_EOL;
    }

    if ($pricePaid > $priceToPay)
    {
        $change = $pricePaid - $priceToPay;
        echo "Your change is ". number_format($change/100,2) ."$\n";

        foreach ($machineCoins as $coin => &$amount)
        {
            $coinAmount = intdiv($change, $coin);

            if ($coinAmount>$amount)
            {
                $change = $change - $amount * $coin;
                $wallet[$coin] = $wallet[$coin] + $amount;
                $amount = 0;
            }
            else
            {
                $change = $change - $coinAmount * $coin;
                $wallet[$coin] = $wallet[$coin] + $coinAmount;
                $amount = $amount -$coinAmount;
            }

            if ($change === 0)
            {
                break;
            }
            if ($coin === 5 && $amount === 0)
            {
                echo "Vending machine ran out of change";
            }
        }
    }
    else
    {
        echo "You paid " . number_format($pricePaid/100,2) . "$\n";
    }

    $buyAgain = readline("Buy another drink (yes/no): ");
    if ($buyAgain !== 'yes')
    {
        break;
    }
}

