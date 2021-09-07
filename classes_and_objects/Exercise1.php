<?php

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "{$this->name}, price {$this->startPrice}, amount {$this->amount}";
    }

    public function setAmount(int $newAmount): void
    {
        $this->amount = $newAmount;
    }

    public function setPrice(float $newPrice): void
    {
        $this->startPrice = $newPrice;
    }
}

$banana = new Product("Banana", 1.1, 13);
$mouse = new Product("Logitech mouse", 70.00, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

echo $banana->printProduct().PHP_EOL;
echo $mouse->printProduct().PHP_EOL;
echo $phone->printProduct().PHP_EOL;
echo $epson->printProduct().PHP_EOL;

$mouse->setAmount(45);
$phone->setPrice(799.99);

echo $banana->printProduct().PHP_EOL;
echo $mouse->printProduct().PHP_EOL;
echo $phone->printProduct().PHP_EOL;
echo $epson->printProduct().PHP_EOL;