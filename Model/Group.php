<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Group {

    private int $id;
    private string $groupName;
    private int $fixDiscount;
    private int $varDiscount;
    private int $parent_id;
    //will contain the parent Group instance or null
    private ?Group $parentGroup; //check if group exists

    public function __construct(int $id, string $groupName, int $fixDiscount, int $varDiscount, int $parent_id, GroupLoader $groupLoader)
    //pass Grouploader in the Group for nesting parents of the group
    {
        $this->id = $id;
        $this->groupName = $groupName;
        $this->fixDiscount = $fixDiscount;
        $this->varDiscount = $varDiscount;
        $this->parent_id = $parent_id;

        $groups = $groupLoader->getGroups();
        //if has parent_id then get the parent Group, else assign null
        $this->parentGroup = ($parent_id !== 0) ? $groups[$parent_id] : null;

    }

    public function getId(): int {
        return $this->id;
    }

    public function getGroupName(): string {
        return $this->groupName;
    }

    public function getFixDiscount(): int {
        return $this->fixDiscount;
    }

    public function getVarDiscount(): int {
        return $this->varDiscount;
    }

    public function getParentId(): int {
        return $this->parent_id;
    }

    public function getParentGroup() {
        return $this->parentGroup;
    }

}

