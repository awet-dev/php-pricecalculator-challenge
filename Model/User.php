<?php
declare(strict_types=1);

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $fixDiscount;
    private int $varDiscount;
    private Group $group;

    public function __construct(int $id, string $firstName, string $lastName, int $fixDiscount, int $varDiscount, Group $group)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fixDiscount = $fixDiscount;
        $this->varDiscount = $varDiscount;
        $this->group = $group;
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


    public function getFixDiscount(): int
    {
        return $this->fixDiscount;
    }


    public function getVarDiscount(): int
    {
        return $this->varDiscount;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }

    // looping over group to get their variable discount
    public function variableDiscountArray($group, $arrayVar = []): array {
        array_push($arrayVar, $group->getVarDiscount());
        if ($group->getParentGroup() !== NULL) {
            $arrayVar = $this->variableDiscountArray($group->getParentGroup(), $arrayVar);
        }
        return $arrayVar;
    }

    // looping over group to get their fixed discount
    public function fixedDiscountArray($group,$arrayFix = []): array {
        array_push($arrayFix, $group->getFixDiscount());
        if ($group->getParentGroup() !== NULL) {
            $arrayFix = $this->fixedDiscountArray($group->getParentGroup(), $arrayFix);
        }
        return $arrayFix;
    }




}