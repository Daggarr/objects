<?php

class Horse
{
    private string $symbol;
    private array $field;
    private int $currentPosition;
    private bool $finished;
    private int $coefficient;
    private int $bet;
    private int $place;

    public function __construct(string $symbol)
    {
        $this->symbol =  $symbol;

        $this->field = array_fill(0,20,"_");
        $this->field[0] = $this->symbol;

        $this->currentPosition = 0;
        $this->finished = false;
        $this->coefficient = rand(1,4);
        $this->bet = 0;
        $this->place = 0;
    }

    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    public function getField(): array
    {
        return $this->field;
    }

    public function getCurrentPosition(): int
    {
        return $this->currentPosition;
    }

    public function getFinished(): bool
    {
        return $this->finished;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPlace(): int
    {
        return $this->place;
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function setBet(int $bet): void
    {
        $this->bet = $bet;
    }

    public function setCurrentPosition(int $position): void
    {
        $this->currentPosition = $position;
    }

    public function setFinished(bool $finished): void
    {
        $this->finished = $finished;
    }

    public function setPlace(int $place): void
    {
        $this->place = $place;
    }

    public function setField(int $key, string $symbol): void
    {
        $this->field[$key] = $symbol;
    }
}

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
    $symbol = readline("Enter horse nr.$i name: ");
    $horses[] = new Horse($symbol);
}

for ($i = 0; $i < $horseAmount; $i++)
{
    echo "Horse nr.". $i ." win coefficient is " . $horses[$i]->getCoefficient() . PHP_EOL;
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

    $horses[$horseNr]->setBet($betAmount);

    $anotherBet = readline("Put another bet?(y/n): ");
    if ($anotherBet !== 'y')
    {
        break;
    }
}

$finished = 0;

foreach ($horses as $horse)
{
    for ($i = 0; $i < count($horse->getField()); $i++)
    {
        echo $horse->getField()[$i]." ";
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
        if ($horses[$i]->getCurrentPosition() === count($horses[$i]->getField()) - 2 && $horses[$i]->getFinished() === false)
        {
            $horses[$i]->setField($horses[$i]->getCurrentPosition(),'_');
            $horses[$i]->setCurrentPosition($horses[$i]->getCurrentPosition() + 1);
            $horses[$i]->setField($horses[$i]->getCurrentPosition(),$horses[$i]->getSymbol());
        }
        elseif ($horses[$i]->getFinished() === false)
        {
            $horses[$i]->setField($horses[$i]->getCurrentPosition(),'_');
            $horses[$i]->setCurrentPosition($horses[$i]->getCurrentPosition() + rand(1,2));
            $horses[$i]->setField($horses[$i]->getCurrentPosition(),$horses[$i]->getSymbol());
        }


        if ($horses[$i]->getCurrentPosition() >= count($horses[$i]->getField()) - 1 && $horses[$i]->getFinished() === false)
        {
            $horses[$i]->setFinished(true);
            $horses[$i]->setPlace($place);
            $finished++;
            $place++;
        }
    }

    foreach ($horses as $horse)
    {
        for ($i = 0; $i < count($horse->getField()); $i++)
        {
            echo $horse->getField()[$i] . " ";
        }
        echo PHP_EOL;
    }
}

foreach ($horses as $horse)
{
    if ($horse->getPlace() === 1)
    {
        $moneyWon = $horse->getBet() * $horse->getCoefficient();
        $money = $money + $moneyWon;
        echo "You won $moneyWon$\n";
    }
}

echo "You have $money$!\n";
