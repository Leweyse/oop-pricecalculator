<?php

class Product
{

    private float $priceInCents;

    private string $productName;

    public function setPriceInCents(string $price): void
    {
        $this -> priceInCents = (float)(intval($price) / 100);
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
