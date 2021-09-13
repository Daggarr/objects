<?php
require_once 'shop.php';
require_once 'product.php';

$productShop = new Shop();

while (true)
{
    $productShop->refreshProducts();

    echo "What would you like to do?: ".PHP_EOL;
    echo "(0) Add a new product: ".PHP_EOL;
    echo "(1) List all products: ".PHP_EOL;
    echo "(2) Exit program: ".PHP_EOL;
    $answer = readline("Enter 0 or 1 or 2: ");

    if ($answer === "0")
    {
        $productShop->addProduct();
    }
    elseif ($answer === "1")
    {
        $productShop->printProducts();
    }
    elseif ($answer === "2")
    {
        exit;
    }
    else
    {
        echo "Invalid command!";
    }
}
