<?php

class ProductLoader extends DatabaseLoader {

private array $products = [];

    /**
     * ProductLoader constructor.
     */
    public function __construct()
    {
        $pdo = $this->openConnection();
        $getProducts= $pdo->prepare('SELECT * FROM product');
        $getProducts->execute();
        $products = $getProducts->fetchAll();
        foreach ($products as $product) {
            $this->products[$product['id']] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }
    }


    public function getProducts(): array
    {
        return $this->products;
    }

}

/*
$pdo = openConnection();
$handle = $pdo->prepare('SELECT some_field FROM some_table where id = :id');
$handle->bindValue(':id', 5);
$handle->execute();
$rows = $handle->fetchAll();
echo htmlspecialchars($rows[0]['some_field']);
*/