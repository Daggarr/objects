<?php

class shop
{

    public $shoppingCart;
    public $products;
    public $quantities;

    public function __construct()
    {
        $this->products = [
            170 => 'fanta',
            140 => 'cola',
            90 => 'skittles',
            70 => 'croissant',
            120 => 'coffee'
        ];

        $this->quantities = [
            2 => 'fanta',
            3 => 'cola',
            5 => 'skittles',
            1 => 'croissant',
            7 => 'coffee'
        ];

        $this->shoppingCart = [];
    }

    public function addToShoppingCart(string $product, int $quantity)
    {
        $this->shoppingCart[] = [$product, $quantity];
    }

    public function showProducts()
    {
        foreach ($this->products as $price => $product)
        {
            echo $product . " " . number_format($price / 100,2) .PHP_EOL;
        }
    }

    public function calculateTotal()
    {
        $totalPrice = 0;
        foreach ($this->shoppingCart as $buyOrder)
        {
            $totalPrice = $totalPrice + array_search($buyOrder[0],$this->products) * $buyOrder[1];
        }
        return $totalPrice;
    }
}


$narvesen = new Shop();
$narvesen->showProducts();
$person = new stdClass();
$person -> money = 500;

while(true)
{
    $order = explode(" ", readline("Enter a products name and quantity (seperated by space): "));
    $product = $order[0];
    $quantity = $order[1];
    if (!in_array($product, $narvesen->products)){
        echo "Product doesn't exist!\n";
        continue;
    }

    if (!is_numeric($quantity))
    {
        echo "Invalid amount!\n";
        continue;
    }

    $quantity = (int) $order[1];

    if ($quantity > array_search($product, $narvesen->quantities))
    {
        echo "Shop doesn't have enough units!\n";
        continue;
    }

    $narvesen->addToShoppingCart($product, $quantity);

    $buyAgain = readline("Do you want anything else?(yes/no): ");
    if ($buyAgain !== 'yes')
    {
        $totalPrice = $narvesen->calculateTotal();
        echo "You have to pay " . number_format($totalPrice / 100,2) . "$ in total!\n";

        if($person->money<$totalPrice)
        {
            echo "You don't have enough money!\n";
        }
        else
        {
            echo "You paid " . number_format($totalPrice / 100,2) . "$\n";
        }
        break;
    }


}