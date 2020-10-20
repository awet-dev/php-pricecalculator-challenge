<?php
declare(strict_types=1);

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $groupId;
    private int $fixDiscount;
    private int $variableDiscount;


    public function __construct(int $id, string $firstName, string $lastName, int $groupId, int $fixDiscount, int $variableDiscount)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->fixDiscount = $fixDiscount;
        $this->variableDiscount = $variableDiscount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function getFixDiscount(): int
    {
        return $this->fixDiscount;
    }

    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }

}