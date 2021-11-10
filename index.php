<?php
require "Model/Discount.php";
require "Model/Product.php";
require "Model/Customer.php";
require "Model/CustomerGroup.php";
require "Model/Data.php";

require "Helper/Connection.php";
require 'Helper/DotEnv.php';

session_start();

$env = new DotEnv(__DIR__ . '/.env');
$env -> load();

$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

$conn = new Connection($hostname, $username, $password, $database);
$data = new Data($conn);

require "Controller/POST.php";

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();

require 'View/public.php';