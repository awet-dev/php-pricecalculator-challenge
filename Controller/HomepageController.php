<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //get customers & products to display in select menu
        $fetchCustomers = new UserLoader();
        $customers = $fetchCustomers->getCustomers();
        $fetchProducts = new ProductLoader();
        $products = $fetchProducts->getProducts();


        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}