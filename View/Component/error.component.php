<?php 

function errorComponent(string $msg) {
    echo "
        <div class='error_container'>
            <h1>$msg</h1>
            <h4>Try again!</h4>
        </div>     
    ";
}