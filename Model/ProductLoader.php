<?php

class ProductLoader extends DatabaseLoader {

private array $products = [];

    /**
     * ProductLoader constructor.
     * @param array $products
     */
    public function __construct(){
        //removed parameter from construct function
        //$this->products = $products;

        $pdo = $this->openConnection();
        $getProducts= $pdo->prepare('SELECT * FROM product');
        $getProducts->execute();
        $products = $getProducts->fetchAll();
        //pass group as object Group with group_id of Customer to attach relevant groups to Customer
        //$loader = new GroupLoader();
        foreach ($products as $product) {
            //$this->products = $loader->getGroups()[(int)$products['group_id']];
            $this->products[$product['id']] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }

    }

    public function getProduct(): array
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