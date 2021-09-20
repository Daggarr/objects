<?php

class ZooView
{
    private Zoo $zoo;

    public function __construct(Zoo $zoo)
    {
        $this->zoo = $zoo;
    }

    public function displayAnimals(): void
    {
        foreach ($this->zoo->getSpots() as $spot)
        {
            echo $spot->getAnimal().PHP_EOL;
        }
    }
}