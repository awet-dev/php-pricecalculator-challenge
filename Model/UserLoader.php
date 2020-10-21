<?php


class UserLoader extends DatabaseLoader
{

    private array $customers;

    public function __construct()
    {
        $pdo = $this->openConnection();
        $getCustomers = $pdo->prepare('SELECT * FROM customer');
        $getCustomers->execute();
        $customers = $getCustomers->fetchAll();
        foreach ($customers as $customer) {
            $this->customers[$customer['id']] = new User((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['group_id'],  (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
        }
    }

    public function getCustomers(): array
    {
        return $this->customers;
    }

}