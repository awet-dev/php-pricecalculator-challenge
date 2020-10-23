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
    private array $arrayData = [];

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

    private function getTableData( $fixCustomer, $varCustomer, $resultGroupFix, $resultGroupVar, $price) {
        $this->arrayData = array('fixCustomer' => $fixCustomer, 'varCustomer' => $varCustomer, 'resultGroupFix' => $resultGroupFix, 'resultGroupVar' => $resultGroupVar, 'price' => $price);
    }

    public function getArrayData() : array {
        return $this->arrayData;
    }


    // looping over group to get their variable discount
    public function variableDiscountArray($group, $arrayVar = []): array {
        array_push($arrayVar, $group->getVarDiscount());
        if ($group->getParentGroup() !== null) {
            $arrayVar = $this->variableDiscountArray($group->getParentGroup(), $arrayVar);
        }
        return $arrayVar;
    }

    // looping over group to get their fixed discount
    public function fixedDiscountArray($group, $arrayFix = []): array {
        array_push($arrayFix, $group->getFixDiscount());
        if ($group->getParentGroup() !== null) {
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
        $fixGroup = array_sum($this->fixedDiscountArray($this->getGroup()));

        //case of variable discounts look for highest discount of all the groups the user has.
        $varGroup = $price*(max($this->variableDiscountArray($this->getGroup()))/100);

        //Look which discount (fixed or variable) will give the customer the most value.
        if($varGroup > $fixGroup){
            $resultGroupVar = $varGroup;
        } else{
            $resultGroupFix = $fixGroup;
        }

        // Get the discount of the customer

        $fixCustomer = $this->getFixDiscount();
        $varCustomer = $price*$this->getVarDiscount() / 100; //make percentage


        if (isset($resultGroupFix)) {
            if ($fixCustomer !== 0) {
                $price = $price - $resultGroupFix - $fixCustomer;
                $this->getTableData($fixCustomer, 0, $resultGroupFix, 0, $price);
            } else {
                $price = $price - $resultGroupFix - $varCustomer;
                $this->getTableData(0, $varCustomer, $resultGroupFix,0, $price);
            }
        } elseif (isset($resultGroupVar)) {
            if ($fixCustomer !== 0) {
                $price = $price - $fixCustomer - $resultGroupVar;
                $this->getTableData($fixCustomer, 0, 0, $resultGroupVar, $price);
            } else {
                $price = $price -$varCustomer -$resultGroupVar;
                $this->getTableData(0, $varCustomer, 0, $resultGroupVar, $price);
            }
            // Format and round the price for the view
            $price = round($price / 100, 2);
            // Price cannot be lower than 0
            if ($price < 0) {
                $price = 0;
            }
        }
        return $price;
    }

}