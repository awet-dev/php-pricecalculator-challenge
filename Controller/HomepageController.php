<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {
        //get customers & products to display in select menu
        $fetchCustomers = new UserLoader();
        $customers = $fetchCustomers->getCustomers();
        $fetchProducts = new ProductLoader();
        $products = $fetchProducts->getProducts();
        var_dump($_POST);

//    if(isset($_POST[$customers->getfirstName])) {
//
//    }

        require 'View/homepage.php';
    }
}