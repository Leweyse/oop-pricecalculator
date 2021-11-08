<?php

class Product
{

    private float $priceInCents;

    private string $productName;

    public function setPriceInCents(int $price): void
    {
        $this -> priceInCents = (float)($price / 100);
    }

    public function setProductName(string $productName): void
    {
        $this -> productName = $productName;
    }

    public function getPriceInCents(): float
    {
        return $this -> priceInCents;
    }

    public function getProductName(): string
    {
        return $this -> productName;
    }
}
