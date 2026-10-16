<?php

declare(strict_types=1);

function login_successful_msg(){
    if(isset($_GET['login']) && $_GET['login'] === "success"){
        echo '<br>';
        echo '<div class="alert1">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>login Success !!!</strong>
        </div>';
    }
}

