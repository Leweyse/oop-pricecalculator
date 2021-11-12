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
$loginError = "";

$password = getenv('PASSWORD');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$hostname = getenv('HOSTNAME');

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

if (isset($_GET['public'])) {
    if (!isset($_SESSION["username"])) {
        require "Controller/POST_LOGIN.php";
        require "View/login.php";
    } else {
        $conn = new Connection($hostname, $_SESSION["username"], $password, $database);
        $data = new Data($conn);
        require "Controller/POST.php";
        require 'View/public.php';
    }
} else {
    require "Controller/POST_LOGIN.php";
    require "View/login.php";
}



