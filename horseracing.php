<?php
$horseAmount = rand(2,6);
$horses = [];

$money = readline("Enter the amount of money you have: ");
if (!is_numeric($money))
{
    echo "Enter a number!\n";
    exit;
}


for ($i = 0; $i < $horseAmount; $i++)
{
    $horses[] = new stdClass();
    $horses[$i]->symbol = readline("Enter horse nr.$i name: ");
    $horses[$i]->field = [$horses[$i]->symbol,"_","_","_","_","_","_","_","_","_","_"];
    $horses[$i]->currentPosition = 0;
    $horses[$i]->finished = false;
    $horses[$i]->coefficient = rand(1,4);
    $horses[$i]->bet = 0;
}

for ($i = 0; $i < $horseAmount; $i++)
{
    echo "Horse nr.". $i ." win coefficient is " . $horses[$i]->coefficient . PHP_EOL;
}

//bet placing loop
while(true)
{
    $betAmount = readline("Enter bet amount: ");
    if (!is_numeric($betAmount))
    {
        echo "Enter a number!\n";
        continue;
    }
    if ($betAmount > $money)
    {
        echo "You don't have enough money!\n";
        continue;
    }

    $betAmount = (int) $betAmount;
    $money = $money - $betAmount;

    $horseNr =(int) readline("Enter number of the horse you want to bet on: ");
    if (array_key_exists($horseNr,$horses) === false)
    {
        echo "That horse doesn't exist!\n";
        continue;
    }

    $horses[$horseNr]->bet = $betAmount;

    $anotherBet = readline("Put another bet?(y/n): ");
    if ($anotherBet !== 'y')
    {
        break;
    }
}

$finished = 0;

foreach ($horses as $horse)
{
    for ($i = 0; $i < count($horse->field); $i++)
    {
        echo $horse->field[$i]." ";
    }
    echo PHP_EOL;
}

$place = 1;

while($finished < $horseAmount)
{
    sleep(1);
    echo PHP_EOL;
    for ($i = 0; $i < $horseAmount; $i++)
    {
        if ($horses[$i]->currentPosition === count($horses[$i]->field)-2 && $horses[$i]->finished === false)
        {
            $horses[$i]->field[$horses[$i]->currentPosition] = "_";
            $horses[$i]->currentPosition = $horses[$i]->currentPosition + 1;
            $horses[$i]->field[$horses[$i]->currentPosition] = $horses[$i]->symbol;
        }
        elseif ($horses[$i]->finished === false)
        {
            $horses[$i]->field[$horses[$i]->currentPosition] = "_";
            $horses[$i]->currentPosition = $horses[$i]->currentPosition + rand(1,2);
            $horses[$i]->field[$horses[$i]->currentPosition] = $horses[$i]->symbol;
        }


        if ($horses[$i]->currentPosition >= count($horses[$i]->field)-1 && $horses[$i]->finished === false)
        {
            $horses[$i]->finished = true;
            $horses[$i]->place = $place;
            $finished++;
            $place++;
        }
    }

    foreach ($horses as $horse)
    {
        for ($i = 0; $i < count($horse->field); $i++)
        {
            echo $horse->field[$i]." ";
        }
        echo PHP_EOL;
    }
}

foreach ($horses as $horse)
{
    if ($horse->place === 1)
    {
        $moneyWon = $horse->bet * $horse->coefficient;
        $money = $money + $moneyWon;
        echo "You won $moneyWon$\n";
    }
}

echo "You have $money$!\n";