<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form method="post">
            <?php
                include 'Component/dropdown.component.php';
                include 'Section/select.section.php';

                $customer = new Customer();
                $product = new Product();
                $customerGroup = new CustomerGroup();

                $colLength = (int)$conn->getColLength("product");

                for ($i = 1; $i <= $colLength; $i++) {
                    $conn->setData($i, "product", ["id", "name", "price"], $product);
                }

                selectSection($conn -> getData());

                $conn -> cleanData();

                $colLength = (int)$conn->getColLength("customer");

                for ($i = 1; $i <= $colLength; $i++) {
                    $conn->setData($i, "customer", ["lastname", "firstname", "group_id", "fixed_discount", "variable_discount"], $customer);
                }
                
                selectSection($conn -> getData());
            ?>
            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>