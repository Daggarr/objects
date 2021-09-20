<?php

class Cage implements Place
{
    private Animal $animal;

    public function addAnimal(Animal $animal): void
    {
        if ($animal instanceof Caged === true)
        {
            $this->animal = $animal;
        }
        else
        {
            echo "That's not a caged animal!".PHP_EOL;
        }
    }

    public function getAnimal(): string
    {
        return $this->animal->getSpecies();
    }
}