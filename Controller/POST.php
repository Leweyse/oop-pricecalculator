<?php
$data->setAllProducts();
$data->setAllCustomers();

$productId = $customerId = $quantity = null;

$fixedArr = [];
$variableArr = [];
$variableAmt = 0;

$msg = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['idProduct']) && isset($_POST['idCustomer']) && isset($_POST['quantity'])) {
        if (ctype_digit(strval($_POST['quantity']))) {
            $productId = $_POST['idProduct'];
            $customerId = $_POST['idCustomer'];
            $quantity = $_POST['quantity'];

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

            $digits = strlen((string) $quantity);
            $quantityDiscount = (10 ** ($digits - 1));

            if ($quantity >= $quantityDiscount && $quantity >= 100) {
                $product["price"] = $product["price"] - ($digits * 12.5 * $quantityDiscount / (10 ** ($digits)));
            }

            $fixedAmt = array_sum($fixedArr);
            $priceAfterFixed = ($product["price"] * (int)$quantity) - $fixedAmt;
            $variableAmt = $priceAfterFixed * (max($variableArr)/100);
            $newPrice = $priceAfterFixed - $variableAmt;

            if ($newPrice < 0) {
                $newPrice = 0;
            }

            $_SESSION["customer_info"] = $data->getNamePls($customerId);
            $_SESSION["product_info"] = ["name" => $product["name"], "price" => $product["price"] . " euro " . "(" . (int)$quantity . " items)"];
            $_SESSION["price_result"] = number_format($newPrice, 2) . " euro";
            $_SESSION["fixed_amount"] = $fixedAmt . " euro";
            $_SESSION["variable_amount"] = max($variableArr) . " %";
        }
        else $msg = "Error in the number of items";
    }
}

