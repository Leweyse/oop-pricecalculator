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

                $data->setAllProducts($product);
                selectSection($data->getAllProducts());

                $data->setAllCustomers($customer);
                selectSection($data->getAllCustomers());
            ?>
            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>