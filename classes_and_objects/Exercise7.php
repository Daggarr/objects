<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother;
    private ?string $father;

    public function __construct(string $name, string $sex, ?string $mother = null, ?string $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName():string
    {
        if ($this->father === null)
        {
            return "Unknown";
        }

        return $this->father;
    }

    public function hasSameMother(object $otherDog):bool
    {
        $otherMother = $otherDog->getMother();
        if ($this->mother === $otherMother)
        {
            return true;
        }
        return false;
    }

    public function getMother(): string
    {
        return $this->mother;
    }
}

$dogs = [
    new Dog("Max", "male", "Lady", "Rocky"),
    new Dog("Rocky", "male","Molly", "Buster"),
    new Dog("Sparky", "male"),
    new Dog("Buster", "male","Lady","Sparky"),
    new Dog("Sam", "male"),
    new Dog("Lady", "female"),
    new Dog("Molly", "female"),
    new Dog("Coco", "female","Molly", "Buster"),
];

echo $dogs[7]->fathersName().PHP_EOL;
echo $dogs[2]->fathersName().PHP_EOL;
echo $dogs[7]->hasSameMother($dogs[1]).PHP_EOL;