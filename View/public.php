<?php
    include 'Component/error.component.php';

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
    <?php
        if ($msg !== null) {
            errorComponent($msg);
        }
    ?>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?public=ztt">Zero two twenty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?public=ttf">Twenty to forty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?public=fts">Forty to sixty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?public=ste">Sixty to eighty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?public=eth">Eighty to one hundred</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?public">All prices</a>
            </li>
        </ul>
    </nav>
    <main>
        <form method="post">
            <?php
            if ($_GET["public"] === "ztt") {
                selectSection($data->getZTT());
            } else if ($_GET["public"] === "ttf") {
                selectSection($data->getTTF());
            } else if ($_GET["public"] === "fts") {
                selectSection($data->getFTS());
            } else if ($_GET["public"] === "ste") {
                selectSection($data->getSTE());
            } else if ($_GET["public"] === "eth") {
                selectSection($data->getETH());
            } else {
                selectSection($data->getAllProducts());
            }
            selectSection($data->getAllCustomers());
            ?>
            <input type="text" name="quantity" placeholder="0">
            <input type="submit" value="Submit">
        </form>

        <?php
            tableSection();
        ?>
    </main>
</body>
</html>