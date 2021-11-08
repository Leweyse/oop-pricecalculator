<?php

class Connection
{
    private Product $product;

    private mysqli $conn;


    public function __construct($hostname, $username, $password, $database)
    {
        $this->conn = new mysqli($hostname, $username, $password, $database);
        $this->product = new Product();
    }

    public function testConnection (): void
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function displayProduct ($id): Product
    {
        $result = $this->conn->query("SELECT name, price FROM product WHERE id = $id");
        $row = $result->fetch_assoc();
        $this->product->setProductName($row["name"]);
        $this->product->setPriceInCents($row["price"]);
        return $this->product;

    }

    public function getColLength ($table): string {
        $result = $this->conn->query("SELECT COUNT(*) FROM $table ");
        $colLength = $result->fetch_assoc();
        return $colLength["COUNT(*)"];
    }


}