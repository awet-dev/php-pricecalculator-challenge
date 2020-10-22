<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render() :void
    {
        //get customers & products to display in select menu
        $fetchCustomers = new UserLoader();
        $customers = $fetchCustomers->getCustomers();
        $fetchProducts = new ProductLoader();
        $products = $fetchProducts->getProducts();

        // When the user submits the homepage form the if below executes
        if (isset($_GET['product'], $_GET['customer'])) {
            // Variables for the homepage view
            $customer = $customers[(int)$_GET['customer']];
            $product = $products[(int)$_GET['product']];
            $productPrice = $product->getPrice() / 100;
            $productName = $product->getName();
            $firstName = $customer->getFirstName();
            $lastName = $customer->getLastName();
            $endPrice = $customer->calculatePrice($product);
            $discount = $productPrice - $endPrice;

            // Order details information
            $order = '<h5>Hello ' . $firstName . ' ' . $lastName . ',<br><br> Your order: ' . $productName . ' for ' . $productPrice . ' &euro;.<br>Your discount: ' . $discount . ' &euro;.<br>Price to pay: ' . $endPrice . ' &euro;</h5>';
        } else {
            $order = '';
        }

        require 'View/homepage.php';
    }
}