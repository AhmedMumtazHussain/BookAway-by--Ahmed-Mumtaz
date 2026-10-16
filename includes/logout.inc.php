<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../view/login.php?logout=success");
    die();

} else {
    header("Location: ../view/index.php");
    die();
}
