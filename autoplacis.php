<?php
class Car
{
    private string $model;
    private string $brand;
    private int $price;

    public function __construct(string $model, string $brand, int $price)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->price = $price;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}

class Buyer
{
    private int $money;

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function carNr(): int
    {
        return (int) readline("Enter number of car you want to buy: ");
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function setMoney(int $price): void
    {
        $this->money = $this->money - $price;
    }
}

class CarShop
{
    private int $carSpots;
    private array $carList;
    private Buyer $customer;

    public function __construct($carSpots)
    {
        $this->carSpots = $carSpots;
        $this->carList = [];
    }

    public function addCars(): void
    {
        for ($i = 1; $i <= $this->carSpots; $i++)
        {
            $carModel = readline("Enter car model: ");
            $carBrand = readline("Enter car brand: ");
            $carPrice = readline("Enter car price: ");

            $this->carList[] = new Car($carModel, $carBrand, $carPrice);
        }
    }

    public function displayCars(): void
    {
        foreach ($this->carList as $key => $car)
        {
            echo "Car nr.$key ".$car->getBrand()." ".$car->getModel()." (".$car->getPrice()."$)" .PHP_EOL;
        }
    }

    public function createBuyer(): void
    {
        $moneyAmount = (int) readline("Enter money amount: ");
        $this->customer = new Buyer($moneyAmount);
    }

    public function buyCar(): string
    {
        $carToBuy = $this->customer->carNr();
        $carPrice = $this->carList[$carToBuy]->getPrice();
        $this->customer->setMoney($carPrice);
        return $this->carList[$carToBuy]->getModel();
    }

    public function getMoney(): int
    {
        return $this->customer->getMoney();
    }
}



$carShop = new CarShop(3);
$carShop->addCars();
$carShop->displayCars();
$carShop->createBuyer();
echo "You bought {$carShop->buyCar()}".PHP_EOL;
echo "You now have {$carShop->getMoney()}".PHP_EOL;
