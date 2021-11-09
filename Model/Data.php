<?php

class Data
{

    private array $allProducts;

    private array $allCustomers;

    private Connection $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setAllProducts($products): void
    {
        $colLength = (int)$this->conn->getColLength("product");

        for ($i = 1; $i <= $colLength; $i++) {
          $this->conn->setData($i, "product", ["id", "name", "price"], $products);
        }

        $this->allProducts = $this->conn->getData();
        $this->conn->clearData();
    }

    public function setAllCustomers($customers): void
    {
        $colLength = (int)$this->conn->getColLength("customer");

        for ($i = 1; $i <= $colLength; $i++) {
            $this->conn->setData($i, "customer", ["id", "firstname", "lastname"], $customers);
        }

        $this->allCustomers = $this->conn->getData();
        $this->conn->clearData();
    }

    public function getAllProducts(): array
    {
        return $this->allProducts;
    }

    public function getAllCustomers(): array
    {
        return $this->allCustomers;
    }
}