<?php

function selectSection($arr) {
    echo "<select name=";
    if(isset($arr[0]['id'])) echo 'productname';
    else echo 'lastname';
    echo ">";
    foreach ($arr as $row) {
        if (isset($row['lastname'])) {
            echo displayDropdown($row['lastname'], $row['firstname']);
        } else {
            echo displayDropdown($row['name'], $row['price']);
        }
    }
    echo "</select>";
}