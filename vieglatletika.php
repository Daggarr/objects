<?php

$playerAmount = (int) readline("Enter player amount: ");
$players = [];

for ($i = 0; $i < $playerAmount; $i++)
{
    $players[]= new stdClass();
    $players[$i]->symbol = readline("Enter player $i name: ");
    $players[$i]->field = [$players[$i]->symbol,"_","_","_","_","_","_","_","_","_","_"];
    $players[$i]->currentPosition = 0;
    $players[$i]->finished = false;
}

$finished = 0;

foreach ($players as $player)
{
    for ($i = 0; $i < count($player->field); $i++)
    {
        echo $player->field[$i]." ";
    }
    echo PHP_EOL;
}

$place = 1;

while($finished < $playerAmount)
{
    sleep(1);
    echo PHP_EOL;
    for ($i = 0; $i < $playerAmount; $i++)
    {
        if ($players[$i]->finished === false)
        {
            $players[$i]->field[$players[$i]->currentPosition] = "_";
            $players[$i]->currentPosition = $players[$i]->currentPosition + rand(1,2);
            $players[$i]->field[$players[$i]->currentPosition] = $players[$i]->symbol;
        }


        if ($players[$i]->currentPosition >= count($players[$i]->field)-1 && $players[$i]->finished === false)
        {
            $players[$i]->finished = true;
            $players[$i]->place = $place;
            $finished++;
            $place++;
        }
    }

    foreach ($players as $player)
    {
        for ($i = 0; $i < count($player->field); $i++)
        {
            echo $player->field[$i]." ";
        }
        echo PHP_EOL;
    }
}

foreach ($players as $player)
{
    echo $player->symbol." Got ". $player->place . " place!\n";
}