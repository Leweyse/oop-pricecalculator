<?php

require "Model/Discount.php";
require "Model/Customer.php";
require "Model/CustomerGroup.php";
require "Model/Product.php";

require "Helper/Connection.php";
require 'Helper/DotEnv.php';

$env = new DotEnv(__DIR__ . '/.env');
$env -> load();

$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

$conn = new Connection($hostname, $username, $password, $database);

$colLength = (int)$conn->getColLength("product");

for ($i = 1; $i <= $colLength; $i++) {
    var_dump($conn -> displayProduct($i));
}

