<?php


class GroupLoader extends DatabaseLoader
{
    private array $groups = [];

    public function __construct()
    {
        $pdo = $this->openConnection();
        $getGroup = $pdo->prepare('SELECT * FROM customer_group');
        $getGroup->execute();
        $groups = $getGroup->fetchAll();
        foreach ($groups as $group) {
            $this->groups[$group['id']] = new Group((int)$group['id'], (string)$group['name'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount']);
        }
    }

    public function getGroups(): array
    {
        return $this->groups;
    }


}