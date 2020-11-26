<?php

class HomepageController
{
    public function displayData() {

        $cusLoader = new CustomerLoader();
        $customers = $cusLoader->getCustomers();
        $proLoader = new ProductLoader();
        $products = $proLoader->getProducts();

        if (isset($_POST['customer']) && isset($_POST['product'])) {
            $customer = $customers[$_POST['customer']];
            $product = $products[$_POST['product']];

            $data = $customer->customerDiscount($product);
        }

        require 'View/homePage.php';
    }

}