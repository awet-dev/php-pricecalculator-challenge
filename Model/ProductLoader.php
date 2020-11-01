<?php


class ProductLoader extends Connection
{
    private array $products;


    public function loadProduct() :void {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM product');
        $statement->execute();
        $products = $statement->fetchAll();
        foreach ($products as $product) {
            $this->products[$product['id']] = new Product((string)$product['name'], (string)$product['price']);
        }
    }

    public function getProducts(): array {
        $this->loadProduct();
        return $this->products;
    }
}