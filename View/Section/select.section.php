<?php

function selectSection($arr) {
    echo "<select>";
    foreach ($arr as $row) {
        if (isset($row['lastname'])) {
            echo displayDropdown($row['lastname'], $row['firstname']);
        } else {
            echo displayDropdown($row['name'], $row['price']);
        }
    }
    echo "</select>";
}