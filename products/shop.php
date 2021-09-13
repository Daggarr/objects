<?php
class Shop
{
    private array $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function refreshProducts(): void
    {
        $this->products = [];

        $open = fopen("products/products.csv",'r');

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            $this->products[] = new Product($data[0], (int) $data[1], $data[2]);
        }

        fclose($open);
    }

    public function addProduct(): void
    {
        $newProduct = [];
        $productName = readline("Enter product name: ");
        $productQuantity = readline("Enter $productName quantity: ");
        $productPrice = readline("Enter $productName price in cents: ");

        $newProduct = [$productName, $productQuantity, $productPrice];

        $open = fopen("products/products.csv",'a');

        fputcsv($open, $newProduct);

        fclose($open);
    }

    public function printProducts(): void
    {
        foreach ($this->products as $product)
        {
            echo $product->getName(). " quantity ".$product->getQuantity().", price ". $product->getPrice()."$";
            echo PHP_EOL;
        }
    }
}