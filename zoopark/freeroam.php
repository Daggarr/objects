<?php

class Freeroam implements Place
{
    private Animal $animal;

    public function addAnimal(Animal $animal): void
    {
        if ($animal instanceof Freeroaming === true)
        {
            $this->animal = $animal;
        }
        else
        {
            echo "That's not a freeroaming animal!".PHP_EOL;
        }
    }

    public function getAnimal(): string
    {
        return $this->animal->getSpecies();
    }
}