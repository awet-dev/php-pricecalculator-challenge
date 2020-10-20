<?php
declare(strict_types=1);

class Product
{
    private int $id;
    private string $name;
    private int $price;

    //koen advised to use type hinting
    //alt insert to create constructor

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct(int $id, string $name, int $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    //created public methods to access private variables 

    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getPrice() : int {
        return $this->price;
    }

}