<?php

function selectSection($arr) {
    echo "<select name=";
    if(isset($arr[0]['price'])) echo 'idProduct';
    else echo 'idCustomer';
    echo ">";
    foreach ($arr as $row) {
        if (isset($row['lastname'])) {
            echo displayDropdown($row['id'], $row['firstname'], $row['lastname']);
        } else {
            echo displayDropdown($row['id'], $row['name'], $row['price']);
        }
    }
    echo "</select>";
}