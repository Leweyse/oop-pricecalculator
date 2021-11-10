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

        $product = $data->getProduct()[0];

        $customer = $data->getCustomer()[0];
        $fixedArr[] = (float)$customer["fixed_discount"];
        $variableArr[] = (float)$customer["variable_discount"];

        $data -> setCustomerGroup($customer["group_id"]);

        $group = $data->getCustomerGroup()[0];
        $parentId = $group["parent_id"];
        $fixedArr[] = (float)$group["fixed_discount"];
        $variableArr[] = (float)$group["variable_discount"];

        while ($parentId != 0) {
            $data->setCustomerGroup($parentId);

            $group = $data->getCustomerGroup()[0];
            $parentId = $group["parent_id"];
            $fixedArr[] = (float)$group["fixed_discount"];
            $variableArr[] = (float)$group["variable_discount"];
        }

        $_SESSION["customer_info"] = [$customer];
        $_SESSION["product_info"] = [$product["name"], $product["price"]];
        $_SESSION["fixed_discount"] = $fixedArr;
        $_SESSION["variable_discount"] = $variableArr;
    }
}

var_dump($fixedArr);
var_dump($variableArr);

