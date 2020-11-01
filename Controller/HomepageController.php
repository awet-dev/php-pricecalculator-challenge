<?php


class HomepageController
{
    public function displayData() {

        $cusLoader = new CustomerLoader();
        $customers = $cusLoader->getCustomers();
        $proLoader = new ProductLoader();
        $products = $proLoader->getProducts();



        require 'View/homePage.php';
    }

}