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
    private array $groups = [];

    /**
     * User constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param int $groupId
     * @param int $fixDiscount
     * @param int $variableDiscount
     **/
    public function __construct(int $id, string $firstName, string $lastName, int $groupId, int $fixDiscount, int $variableDiscount)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->fixDiscount = $fixDiscount;
        $this->variableDiscount = $variableDiscount;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @return int
     */
    public function getFixDiscount(): int
    {
        return $this->fixDiscount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }

    // get all the group that belong to this customer
    public function getGroups() {
        $group = new GroupLoader();
        $customerGroup = $group->getGroups($this->getGroupId()); // return all the groups
        var_dump($customerGroup); // for test
        array_push($this->groups, $customerGroup); // push it to the group array
       while ($this->groups[count($this->groups)-1]->getParentId() !== NULL) { // is the group in this->group has a parent group
            $customerGroup = $group->getGroups('parent_id');
            array_push($this->groups, $customerGroup); // push it to the group array
       }
    }

    //make array of variable discounts of the groups with recursive function to get data out of tree
    public function variableDiscountArray($arrayFixed = []): array
    {
       if ($this->getFixDiscount()) {
           array_push($arrayFixed, $this->getFixDiscount());
       }
       $this->getGroups();
       foreach ($this->groups as $group) {
           if ($group['fixed_discount'] !== null) {
               array_push($arrayFixed, $group['fixed_discount']);
           }
       }
       return $arrayFixed;
    }

    public function getVarDiscount($arrayVar = [] ) {
        if ($this->getVariableDiscount()) {
            array_push($arrayVar, $this->getVariableDiscount());
        }
        $this->getGroups();
        foreach ($this->groups as $group) {
            if ($group['variable_discount']) {
                array_push($arrayVar, $group['variable_discount']);
            }
        }
        return $arrayVar;
    }

    public function calculatePrice (Product $product) {
        $price = $product->getPrice();
        $fixedDiscount = array_sum($this->variableDiscountArray());
        $varDiscount = max($this->getVarDiscount());
        return $fixedDiscount + ($price * $varDiscount)/100;
    }

}