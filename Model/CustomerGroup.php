<?php

class CustomerGroup extends Discount
{

    private string $name;

    private string $id;

    private string $parentId;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setParentId($parentId): void
    {
        $this->parentId = $parentId;
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

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParentId()
    {
        return $this->parentId;
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