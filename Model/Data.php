<?php

use JetBrains\PhpStorm\Pure;

class Data
{

    private array $allProducts;

    private array $allCustomers;

    private array $arrProduct;

    private array $arrCustomer;

    private array $arrCustomerGroup;

    // Zero to Twenty
    private array $ztt;
    // Twenty to Fourty
    private array $ttf;
    // Fourty to Sixty
    private array $fts;
    // Sixty to Eighty
    private array $ste;
    // Eighty to Hundred
    private array $eth;

    private Customer $customer;
    
    private Product $product;

    private Discount $discount;

    private Connection $conn;

    #[Pure] public function __construct($conn)
    {
        $this->conn = $conn;

        $this->product = new Product();

        $this->customer = new Customer();

        $this->discount = new Discount();
    }

    public function setAllProducts(): void
    {
        $colLength = (int)$this->conn->getColLength("product");

        for ($i = 1; $i <= $colLength; $i++) {
            $productInfo = $this->conn->setData($i, "product", ["id", "name", "price"], $this->product);

            if ($productInfo['price'] > 0 && $productInfo['price'] < 20) {
                $ztt[] = $productInfo;
            } else if ($productInfo['price'] >= 20 && $productInfo['price'] < 40) {
                $ttf[] = $productInfo;
            } else if ($productInfo['price'] >= 40 && $productInfo['price'] < 60) {
                $fts[] = $productInfo;
            } else if ($productInfo['price'] >= 60 && $productInfo['price'] < 80) {
                $ste[] = $productInfo;
            } else if ($productInfo['price'] >= 80 && $productInfo['price'] < 100) {
                $eth[] = $productInfo;
            }
        }

        $this->allProducts = $this->conn->getData();
        $this->conn->clearData();
    }

    public function setProduct($id): void
    {
        $this->conn->setData($id, "product", ["id", "name", "price"], $this->product);

        $this->arrProduct = $this->conn->getData();
        $this->conn->clearData();
    }

    public function setAllCustomers(): void
    {
        $colLength = (int)$this->conn->getColLength("customer");

        for ($i = 1; $i <= $colLength; $i++) {
            $this->conn->setData($i, "customer", ["id", "firstname", "lastname"], $this->customer);
        }

        $this->allCustomers = $this->conn->getData();
        $this->conn->clearData();
    }

    public function setCustomer($id): void
    {
        $this->conn->setData($id, 'customer', ["group_id", "fixed_discount", "variable_discount"], $this->discount);

        $this->arrCustomer = $this->conn->getData();
        $this->conn->clearData();
    }

    public function setCustomerGroup($id): void
    {
        $this->conn->setData($id, 'customer_group', ["parent_id", "fixed_discount", "variable_discount"], $this->discount);

        $this->arrCustomerGroup = $this->conn->getData();
        $this->conn->clearData();
    }

    public function getAllProducts(): array
    {
        return $this->allProducts;
    }

    public function getZTT(): array
    {
        return $this->ztt;
    }

    public function getTTF(): array
    {
        return $this->ttf;
    }

    public function getFTS(): array
    {
        return $this->fts;
    }

    public function getSTE(): array
    {
        return $this->ste;
    }

    public function getETH(): array
    {
        return $this->eth;
    }

    public function getProduct(): array
    {
        return $this->arrProduct;
    }

    public function getAllCustomers(): array
    {
        return $this->allCustomers;
    }

    public function getCustomer(): array
    {
        return $this->arrCustomer;
    }

    public function getCustomerGroup(): array
    {
        return $this->arrCustomerGroup;
    }

    public function getNamePls($id): array
    {
       return $this->conn->getName($id);
    }
}