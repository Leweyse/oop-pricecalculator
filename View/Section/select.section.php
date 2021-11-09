<?php

function selectSection($arr) {
    foreach ($arr as $row) {
        if (isset($row['lastname'])) {
            displayDropdown($row['lastname'], $row['firstname']);
        } else {
            displayDropdown($row['name'], $row['price']);
        }
    }
}