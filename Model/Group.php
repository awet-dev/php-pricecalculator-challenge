<?php

class Group {

    private int $id;
    private string $groupName;
    private int $parentId;
    private int $fixDiscount;
    private int $varDiscount;

    /**
     * Group constructor.
     * @param int $id
     * @param string $groupName
     * @param int $parentId
     * @param int $fixDiscount
     * @param int $varDiscount
     */
    public function __construct(int $id, string $groupName, int $parentId, int $fixDiscount, int $varDiscount)
    {
        $this->id = $id;
        $this->groupName = $groupName;
        $this->parentId = $parentId;
        $this->fixDiscount = $fixDiscount;
        $this->varDiscount = $varDiscount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }


    public function getFixDiscount(): int
    {
        return $this->fixDiscount;
    }

    public function getVarDiscount(): int
    {
        return $this->varDiscount;
    }

}

