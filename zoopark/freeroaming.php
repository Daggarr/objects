<?php

class Freeroaming implements Animal
{
    private string $species;

    public function __construct(string $species)
    {
        $this->species = $species;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }
}