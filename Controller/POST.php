<?php
$data->setAllProducts();
$data->setAllCustomers();

$productId = $customerId = null;

$fixedArr = [];
$variableArr = [];
$variableAmt = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['idProduct'], $_POST['idCustomer'])) {
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

        $fixedAmt = array_sum($fixedArr);
        $priceAfterFixed = $product["price"] - $fixedAmt;
        $variableAmt = $priceAfterFixed * (max($variableArr)/100);
        $newPrice = $priceAfterFixed - $variableAmt;

        if ($newPrice < 0) {
            $newPrice = 0;
        }

        $_SESSION["customer_info"] = $data->getNamePls($customerId);
        $_SESSION["product_info"] = ["name" => $product["name"], "price" => $product["price"] . " euro"];
        $_SESSION["price_result"] = number_format($newPrice, 2) . " euro";
        $_SESSION["fixed_amount"] = $fixedAmt . " euro";
        $_SESSION["variable_amount"] = max($variableArr) . " %";
    }
}

