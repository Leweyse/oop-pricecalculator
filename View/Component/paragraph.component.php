<?php

function columnComponent($info, $className): string
{
    return "<p class='$className'>" . $info . "</p>";
}