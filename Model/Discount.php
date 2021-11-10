<?php

class Discount
{
    private string $id;

    private string $fixedDiscount;

    private string $variableDiscount;

    public function setId($id)
    {
        if ($id != null) {
            $this->id = $id;
        } else {
            $this->id = 0;
        }
    }

    public function setFixedDiscount($fixedDiscount)
    {
        if ($fixedDiscount != null) {
            $this->fixedDiscount = $fixedDiscount;
        } else {
            $this->fixedDiscount = 0;
        }
    }

    public function setVariableDiscount($variableDiscount)
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

    public function getFixedDiscount()
    {
        return $this->fixedDiscount;
    }

    public function getVariableDiscount()
    {
        return $this->variableDiscount;
    }
}