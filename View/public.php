<?php
    include 'Component/dropdown.component.php';
    include 'Component/paragraph.component.php';

    include 'Section/select.section.php';
    include 'Section/article.section.php';
    include 'Section/table.section.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Price Calculator</title>
</head>
<body>
    <main>
        <form method="post">
            <?php
                selectSection($data->getAllProducts());
                selectSection($data->getAllCustomers());
            ?>
            <input type="submit" value="Submit">
        </form>

        <?php
            tableSection();
        ?>
    </main>
</body>
</html>