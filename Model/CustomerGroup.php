<?php

class CustomerGroup extends Discount
{

    private string $name;

    private int $id;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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