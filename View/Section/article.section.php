<?php

function articleSection($variableName, $section) {
    echo "<article class='$variableName'>";
    echo columnComponent($section, "section_name");
        $info = [];

        foreach ($_SESSION as $key => $value) {
            if ($key === $variableName) {
                if (is_array($value)) {
                    foreach ($value as $info_value) {
                        $info[] = $info_value;
                    }
                } else {
                    $info[] = "Result";
                    $info[] = $value;
                }
            }
        }

        foreach ($info as $elem) {
            echo columnComponent($elem, "info");
        }
    echo "</article>";
}