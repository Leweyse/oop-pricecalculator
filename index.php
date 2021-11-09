<?php
require "Model/Discount.php";
require "Model/Product.php";
require "Model/Customer.php";
require "Model/CustomerGroup.php";

require "Helper/Connection.php";
require 'Helper/DotEnv.php';

$env = new DotEnv(__DIR__ . '/.env');
$env -> load();

$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

$conn = new Connection($hostname, $username, $password, $database);
$customer = new Customer();
$product = new Product();
$customerGroup = new CustomerGroup();

$colLength = (int)$conn->getColLength("product");

for ($i = 1; $i <= $colLength; $i++) {
    $conn->setData($i, "product", ["id", "name", "price"], $product);
}

require 'View/public.php';