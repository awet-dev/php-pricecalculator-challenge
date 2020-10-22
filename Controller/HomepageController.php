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

        if (isset($_POST['customer'], $_POST['product'])) {
            $customer = $customers[$_POST['customer']];
            $product = $products[$_POST['product']];
            $firstName = $customer->getFirstName();
            $lastName = $customer->getLastName();
            $price = $product->getPrice()/100;
            $name = $product->getName();
            $totalDiscount = $customer->calculatePrice($product);
            $endPrice = $price - $totalDiscount;

            //message for customer to see his/her order
            $order = '<h5>Hello '.$firstName.' '.$lastName.',<br><br> Your order: '.$name.' for '.$price.' &euro;.<br>Your discount: '.$totalDiscount.' &euro;.<br>Price to pay: '.$endPrice.' &euro;</h5>';
        } else {
            $order = '';
        }

        require 'View/homepage.php';
    }
}