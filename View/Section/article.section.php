<?php

function infoSection($variableName, $section) {
    echo "<article>";
    echo columnComponent($section, "section_name");
        $info = [];

        foreach ($_SESSION as $key => $value) {
            if ($key == $variableName) {
                foreach ($value as $info_value) {
                    array_push($info, $info_value);
                }
            }
        }

        foreach ($info as $elem) {
            echo columnComponent($elem, "info");
        }
    echo "</article>";
}