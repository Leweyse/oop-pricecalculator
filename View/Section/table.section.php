<?php 

function tableSection() {
    echo "<section class='table_result'>";
    if (count($_SESSION) > 0) {
        infoSection("customer_info", "Customer");
        infoSection("product_info", "Product");
    }
    echo "</section>";
}