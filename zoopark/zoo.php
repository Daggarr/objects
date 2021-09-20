<?php

class Zoo
{
    private array $spots = [];

    public function add(Place $spot): void
    {
        $this->spots[] = $spot;
    }

    public function getSpots(): array
    {
        return $this->spots;
    }
}