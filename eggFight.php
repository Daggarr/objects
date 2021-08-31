<?php

class Egg
{
    public function __construct(string $type, int $chance)
    {
        $this->type = $type;
        $this->chance = $chance;
    }

}

$eggs = [
    new Egg('Wooden', 70),
    new Egg('Iron', 90),
    new Egg('Glass', 20),
    new Egg('Normal', 50)
];
$playerEggs = [
    clone $eggs[array_rand($eggs)],
    clone $eggs[array_rand($eggs)],
    clone $eggs[array_rand($eggs)],
    clone $eggs[array_rand($eggs)],
    clone $eggs[array_rand($eggs)],
];

while(true){
    echo "Starting egg fight!\n";

    $pcEgg = $eggs[array_rand($eggs)];
    $pcEggChance = $pcEgg->chance;
    $playerEgg = $playerEggs[array_rand($playerEggs)];
    $playerEggChance = $playerEgg->chance;
    $totalChance = $pcEggChance + $playerEggChance;

    echo "You got {$playerEgg->type} egg!\n";
    echo "Pc got {$pcEgg->type} egg!\n";

    $pcWins = 0;
    $playerWins = 0;

    for ($i = 1; $i <= 2; $i++)
    {
        $chance = rand(1,$totalChance);
        if ($chance <= $pcEggChance)
        {
            echo "Pc won on $i side!".PHP_EOL;
            $pcWins++;
        }
        else
        {
            echo "You won on $i side!".PHP_EOL;
            $playerWins++;
        }
    }

    if ($pcWins === $playerWins)
    {
        echo "It's a tie!\n";
        array_splice($playerEggs, array_search($playerEgg, $playerEggs),1);
    }
    elseif ($pcWins > $playerWins)
    {
        echo "Pc won!\n";
        array_splice($playerEggs, array_search($playerEgg, $playerEggs),1);
    }
    else
    {
        echo "You won!\n";
        array_push($playerEggs,$pcEgg);
    }

    if (count($playerEggs) === 0){
        echo "You ran out of eggs!\n";
        break;
    }

    $playAgain = readline("Play again?(yes/no): ");
    if ($playAgain == "no")
    {
        echo "You got " . count($playerEggs) . " eggs in total!\n";
        break;
    }
}

