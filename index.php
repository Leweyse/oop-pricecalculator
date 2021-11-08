<?php

include 'Helper/DotEnv.php';
$post = new DotEnv(__DIR__ . '/.env');
$post -> load();

echo getenv('APP_ENV');