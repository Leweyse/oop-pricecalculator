<?php
require "Helper/Connection.php";
require "Model/Product.php";
require "Model/Customer.php";
require "Model/CustomerGroup.php";
require "Model/Discount.php";
include 'Helper/DotEnv.php';

$post = new DotEnv(__DIR__ . '/.env');
$post -> load();
$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

$conn = new Connection($hostname, $username, $password, $database);
$colLength = (int)$conn->getColLength("product");

for ($i = 1; $i <= $colLength; $i++) {
    var_dump($conn->getProduct($i));
}

