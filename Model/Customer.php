<?php

Class Customer extends Discount
{
    private string $id;

    private string $firstName;

    private string $lastName;

    private int $groupId;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
    }

    public function setFixedDiscount($fixedDiscount): void
    {
        if ($fixedDiscount != null) {
            $this->fixedDiscount = $fixedDiscount;
        } else {
            $this->fixedDiscount = 0;
        }
    }

    public function setVariableDiscount($variableDiscount): void
    {
        if ($variableDiscount != null) {
            $this->variableDiscount = $variableDiscount;
        } else {
            $this->variableDiscount = 0;
        }
    }

    public function getId()
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

    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }
    
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }
}