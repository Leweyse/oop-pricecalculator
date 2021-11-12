<?php
    include 'Component/error.component.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Price Calculator Login</title>
</head>
<body>
    <main>
        <?php 
            if ($msg !== null) {
                errorComponent($msg);
            }
        ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
    </main>
</body>
</html>