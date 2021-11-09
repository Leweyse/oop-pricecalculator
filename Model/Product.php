<?php

class Product
{

    private float $priceInCents;

    private string $productName;

    private string $productId;

    public function setId(string $productId): void
    {
        $this -> productId = $productId;
    }

    public function setProductName(string $productName): void
    {
        $this -> productName = $productName;
    }

    public function setPriceInCents(string $price): void
    {
        $this -> priceInCents = (float)(intval($price) / 100);
    }

    public function getId(): string
    {
        return $this -> productId;
    }

    public function getProductName(): string
    {
        return $this -> productName;
    }

    public function getPriceInCents(): float
    {
        return $this -> priceInCents;
    }
}
