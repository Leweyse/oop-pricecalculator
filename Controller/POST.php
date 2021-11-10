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



$fixedArr = [];
$variableArr = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['idProduct']) && isset($_POST['idCustomer'])) {
        $productId = $_POST['idProduct'];
        $customerId = $_POST['idCustomer'];
        $data -> setProduct($productId);
        $data -> setCustomer($customerId);
        $customer = $data->getCustomer();
        $fixedArr[] = (float)$customer[0]["fixed_discount"];
        $variableArr[] = (float)$customer[0]["variable_discount"];
        $data -> setCustomerGroup($customer[0]["group_id"]);
        $group = $data->getCustomerGroup();
        $parentId = $group[0]["parent_id"];
        $fixedArr[] = (float)$group[0]["fixed_discount"];
        $variableArr[] = (float)$group[0]["variable_discount"];
        while ($parentId != 0) {
            $data->setCustomerGroup($parentId);
            $group = $data->getCustomerGroup();
            $parentId = $group[0]["parent_id"];
            $fixedArr[] = (float)$group[0]["fixed_discount"];
            $variableArr[] = (float)$group[0]["variable_discount"];
        }
    }
}

var_dump($fixedArr);
var_dump($variableArr);

