<?php
//TODO
//with the value of $POST, we check the id of the customer
//use id of the customer to check fixed and variable discounts and group id
//use group id to check fixed and variable discounts and parent id
//while parent id!=null, use parent id to check fixed and variable discounts of parent group
//add sum of fixed discounts to highest value of variable discount
//deduct discount from item price
//if item price < 0, item price = 0

$customer = new Customer();
$product = new Product();
$customerGroup = new CustomerGroup();

$data->setAllProducts($product);
$data->setAllCustomers($customer);
$data->setAllCustomerGroups($customerGroup);