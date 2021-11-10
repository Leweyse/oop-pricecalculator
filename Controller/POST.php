<?php
//TODO
//with the value of $POST, we check the id of the customer
//use id of the customer to check fixed and variable discounts and group id
//use group id to check fixed and variable discounts and parent id
//while parent id!=null, use parent id to check fixed and variable discounts of parent group
//add sum of fixed discounts to highest value of variable discount
//deduct discount from item price
//if item price < 0, item price = 0

$discount = new Discount();

$data->setAllProducts();
$data->setAllCustomers();

$productId = $customerId = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['idProduct']) && isset($_POST['idCustomer'])) {
        $productId = $_POST['idProduct'];
        $customerId = $_POST['idCustomer'];

        var_dump($data -> setProduct($productId));
        var_dump($data -> setCustomer($customerId));
        var_dump($data -> setCustomerGroup($customerId));

        var_dump($data -> getProduct());
        var_dump($data -> getCustomer());
        var_dump($data -> getCustomerGroup());
    }
}

var_dump($productId, $customerId);