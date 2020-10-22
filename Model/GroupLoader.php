<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class GroupLoader extends DatabaseLoader
{
    private array $groups = [];

    public function __construct()
    {
        if (empty($this->groups)){

            $pdo = $this->openConnection();
            $statement = $pdo->prepare('SELECT * FROM customer_group');
            $statement->execute();
            $groups = $statement->fetchAll();
            foreach ($groups as $group) {
                //pass GroupLoader to the new Group instances
                //because we cannot instantiate new instances inside other classes
                $this->groups[$group['id']] = new Group((int)$group['id'], $group['name'], (int)$group['fixed_discount'], (int)$group['variable_discount'], (int)$group['parent_id'], $this);
            }

        }

    }

    public function getGroups(): array
    {
        //$this->groups = json_decode(json_encode($this->groups), true);
        return  $this->groups;

    }

}