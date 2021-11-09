<?php

function displayDropdown ($id, $param1, $param2): string
{
    return "<option value='" . $id ."'>" . $param1 . " " . $param2 . "</option>";
}
