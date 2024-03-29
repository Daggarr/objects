<?php

class Product
{
    private string $name;
    private int $quantity;
    private int $price;

    public function __construct(string $name, int $quantity, int $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }


}