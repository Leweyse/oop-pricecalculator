<?php

function articleSection($variableName, $section) {
    echo "<article class='$variableName'>";
    echo columnComponent($section, "section_name");
        $info = [];

        foreach ($_SESSION as $key => $value) {
            if ($key == $variableName) {
                if (gettype($value) == "array") {
                    foreach ($value as $info_value) {
                        array_push($info, $info_value);
                    }
                } else {
                    array_push($info, "Result");
                    array_push($info, $value);
                }
            }
        }

        foreach ($info as $elem) {
            echo columnComponent($elem, "info");
        }
    echo "</article>";
}