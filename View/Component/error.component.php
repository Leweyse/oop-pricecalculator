<?php 

function errorComponent(string $msg) {
    echo "
        <div class='error_container'>
            <h1>$msg. Try again!</h1>
        </div>     
    ";
}