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
    private array $groups;

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

    public function getGroups() {
        $group = new GroupLoader();
        $allGroup = $group->getGroups(); // this returns all the groups
        $customerGroup = $allGroup[$this->getGroupId()]; // group for the customer
        array_push($this->groups, $customerGroup); // push it to the group array
        while ($customerGroup['parent_id']) {
            $customerGroup = $allGroup[$customerGroup['parent_id']];
            array_push($this->groups, $customerGroup); // push it to the group array
        }
    }





}