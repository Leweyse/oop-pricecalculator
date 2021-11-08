<?php
require "Helper/Connection.php";
require "Model/Product.php";
include 'Helper/DotEnv.php';

$post = new DotEnv(__DIR__ . '/.env');
$post -> load();
$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

$conn = new Connection($hostname, $username, $password, $database);

for ($i = 1; $i < 100; $i++) {
    var_dump($conn->displayProduct($i));
}

