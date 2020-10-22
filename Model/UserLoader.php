<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class UserLoader extends DatabaseLoader
{

    private array $customers;

    public function __construct()
    {
        $pdo = $this->openConnection();
        $getCustomers = $pdo->prepare('SELECT * FROM customer');
        $getCustomers->execute();
        $customers = $getCustomers->fetchAll();

        $loader= new GroupLoader();
        //pass group as object Group with group_id of customer to attached relevant groups to customer

        foreach ($customers as $customer) {

            $group = $loader->getGroups()[(int)$customer['group_id']];
            //passing Group as parameter in the User class
            $this->customers[$customer['id']] = new User((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['fixed_discount'], (int)$customer['variable_discount'], $group);
        }
    }

    public function getCustomers(): array
    {
        return $this->customers;
    }

}