<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ((isset($_POST["username"], $_POST["password"]) && ($_POST["username"] !== $username)) || ($_POST["password"] !== $password)) {
        $loginError = "Incorrect login details";
    } else {
        $_SESSION["username"] = $username;
        header('location: /?public');
        exit();
    }
}

