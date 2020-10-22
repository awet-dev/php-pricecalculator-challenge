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

    /*
    To calculate the price:
    For the customer group: In case of variable discounts look for highest discount of all the groups the user has.
    If some groups have fixed discounts, count them all up.
    Look which discount (fixed or variable) will give the customer the most value.
    Now look at the discount of the customer.
    In case both customer and customer group have a percentage, take the largest percentage.
    First subtract fixed amounts, then percentages!
    A price can never be negative.
    */


    public function calculatePrice(Product $product): float {

        $price = $product->getPrice();
        // If some groups have fixed discounts, count them all up.
        $fixGroup = array_sum($this->fixedDiscountArray($this->getGroup())) * 100;
        //Multiply by 100 in order to change discounts to cents

        $varGroup = ($price * (max($this->variableDiscountArray($this->getGroup()))/100));
        //case of variable discounts look for highest discount of all the groups the user has.

        //Look which discount (fixed or variable) will give the customer the most value.
        if($varGroup > $fixGroup){
            $resultGroupVar = $varGroup;
        } else{
            $resultGroupFix = $fixGroup;
        }

        // Get the discount of the customer

        $fixCustomer = $this->getFixDiscount() * 100; //change to cents
        $varCustomer = $this->getVarDiscount() / 100; //make percentage




    }

}