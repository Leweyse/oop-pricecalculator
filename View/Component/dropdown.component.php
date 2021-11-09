<?php

function displayDropdown ($param1, $param2): string
{
    return "<option value='" . $param1 ."'>" . $param1 . " " . $param2 . "</option>";
}
