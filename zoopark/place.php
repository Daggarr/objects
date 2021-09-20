<?php

interface Place
{
    public function addAnimal(Animal $animal): void;
    public function getAnimal():string;
}