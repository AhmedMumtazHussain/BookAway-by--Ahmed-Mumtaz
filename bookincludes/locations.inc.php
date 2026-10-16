<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $season = $_POST['season'];
    $child = $_POST['child'];
    
} else {
    $checkin = "";
    $checkout = "";
    $season = "";
    $child = "";
}

require_once 'dbh.inc.php';
require_once 'locations_model.inc.php';
$result = get_displayhotels($pdo , $checkin , $checkout , $season , $child);
$pdo = null;
$query = null;







