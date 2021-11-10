<?php

class Data
{

    private array $allProducts;

    private array $allCustomers;

    private array $arrProduct;

    private array $arrCustomer;

    private array $arrCustomerGroup;

    private Customer $customer;
    
    private Product $product;

    private Discount $discount;

    private Connection $conn;

    public function __construct($conn)
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
          $this->conn->setData($i, "product", ["id", "name", "price"], $this->product);
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
}