<?php 

function tableSection() {
    echo "<section class='table_result'>";
    if (count($_SESSION) > 0) {
        articleSection("customer_info", "Customer");
        articleSection("product_info", "Product");
        articleSection("fixed_amount", "Fixed Discount");
        articleSection("variable_amount", "Variable Discount");
        articleSection("price_result", "Price Result");
    }
    echo "</section>";
}