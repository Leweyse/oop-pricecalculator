<?php

class Discount
{
    private string $id;

    private string $fixedDiscount;

    private string $variableDiscount;

    public function setId($id): void
    {
        if ($id !== null) {
            $this->id = $id;
        } else {
            $this->id = 0;
        }
    }

    public function setFixedDiscount($fixedDiscount): void
    {
        if ($fixedDiscount !== null) {
            $this->fixedDiscount = $fixedDiscount;
        } else {
            $this->fixedDiscount = 0;
        }
    }

    public function setVariableDiscount($variableDiscount): void
    {
        if ($variableDiscount !== null) {
            $this->variableDiscount = $variableDiscount;
        } else {
            $this->variableDiscount = 0;
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFixedDiscount(): string
    {
        return $this->fixedDiscount;
    }

    public function getVariableDiscount(): string
    {
        return $this->variableDiscount;
    }
}