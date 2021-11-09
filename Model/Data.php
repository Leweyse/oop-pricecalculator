<?php

class Data
{

    private array $allProducts;

    private array $allCustomers;

    private array $allCustomerGroups;

    private array $allDiscounts;

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

    /**
     * @return array
     */
    public function getAllProducts(): array
    {
        return $this->allProducts;
    }


    /**
     * @return array
     */
    public function getAllCustomers(): array
    {
        return $this->allCustomers;
    }

    /**
     * @param array $allCustomers
     */
    public function setAllCustomers($customers): void
    {
        $colLength = (int)$this->conn->getColLength("customer");

        for ($i = 1; $i <= $colLength; $i++) {
            $this->conn->setData($i, "customer", ["firstname", "lastname", "group_id", "fixed_discount", "variable_discount"], $customers);
        }
        $this->allCustomers = $this->conn->getData();
        $this->conn->clearData();
    }

    /**
     * @return array
     */
    public function getAllCustomerGroups(): array
    {
        return $this->allCustomerGroups;
    }

    /**
     * @param array $allCustomerGroups
     */
    public function setAllCustomerGroups(array $allCustomerGroups): void
    {
        $this->allCustomerGroups = $allCustomerGroups;
    }

    /**
     * @return array
     */
    public function getAllDiscounts(): array
    {
        return $this->allDiscounts;
    }

    /**
     * @param array $allDiscounts
     */
    public function setAllDiscounts(array $allDiscounts): void
    {
        $this->allDiscounts = $allDiscounts;
    }


}