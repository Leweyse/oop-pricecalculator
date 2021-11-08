<?php

class Product
{

    private int $priceInCents;

    private string $productName;

    /**
     * @param int $priceInCents
     */
    public function setPriceInCents(int $priceInCents): void
    {
        $this->priceInCents = $priceInCents;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }


}
