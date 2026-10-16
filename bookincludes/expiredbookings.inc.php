<?php

require_once 'dbh.inc.php';

    $today = new DateTime();
    // $today->modify('+1 days');
    $today = $today->format('Y-m-d');

    $stmt = $pdo->prepare("
        DELETE FROM bookings 
        WHERE checkout < :today
    ");
    $stmt->execute(['today' => $today]);

    $deletedCount = $stmt->rowCount();

    // echo "Deleted $deletedCount expired booking(s) from the database.";
    $stmt=null;


