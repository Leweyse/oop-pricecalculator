<?php

class Connection
{
    private Product $product;

    private mysqli $conn;

    private Customer $customer;

    private CustomerGroup $customerGroup;

    private Discount $discount;


    public function __construct($hostname, $username, $password, $database)
    {
        $this->conn = new mysqli($hostname, $username, $password, $database);
        $this->product = new Product();
        $this->customer = new Customer();
        $this->customerGroup = new CustomerGroup();
        $this->discount = new Discount();
    }

    public function testConnection (): void
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getProduct ($id): Product
    {
        $result = $this->conn->query("SELECT name, price FROM product WHERE id = $id");
        $row = $result->fetch_assoc();
        $this->product->setProductName($row["name"]);
        $this->product->setPriceInCents($row["price"]);
        return $this->product;
    }

    public function getCustomer($id): Customer
    {
        $customerData = $this->conn->query("SELECT firstname, lastname FROM customer WHERE id = $id");
        $customer = $customerData->fetch_assoc();
        $this->customer->setFirstName($customer["firstname"]);
        $this->customer->setLastName($customer["lastname"]);
        $this->customerGroup->setId($customer["group_id"]);
        return $this->customer;
    }

    public function getCustomerGroup($id): CustomerGroup {
        $customerGroupData = $this->conn->query("SELECT name FROM customer_group WHERE id = $id");
        $customerGroup = $customerGroupData->fetch_assoc();
        $this->customerGroup->setName($customerGroup["name"]);
    }

    public function getColLength ($table): string {
        $result = $this->conn->query("SELECT COUNT(*) FROM $table ");
        $colLength = $result->fetch_assoc();
        return $colLength["COUNT(*)"];
    }


}