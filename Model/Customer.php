<?php

Class Customer extends Discount
{
    private string $firstName;

    private string $lastName;

    private int $groupId;

    private CustomerGroup $customerGroup;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * @param CustomerGroup $customerGroup
     */
    public function setCustomerGroup(CustomerGroup $customerGroup): void
    {
        $this->customerGroup = $customerGroup;
    }

    /**
     * @param int $fixedDiscount
     */
    public function setFixedDiscount(int $fixedDiscount): void
    {
        $this->fixedDiscount = $fixedDiscount;
    }

    /**
     * @param int $variableDiscount
     */
    public function setVariableDiscount(int $variableDiscount): void
    {
        $this->variableDiscount = $variableDiscount;
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
     * @return CustomerGroup
     */
    public function getCustomerGroup(): CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @return int
     */
    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }



}