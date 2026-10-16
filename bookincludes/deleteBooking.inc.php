<?php

require_once 'config_session.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php?logintounbook=truee");
    die();
}

if(!isset($_POST['bookingid']))
{
    header("Location: ../view/booking.php?invalidunbook=truee");
    die();
}

require_once 'dbh.inc.php';

$userId = $_SESSION['user_id'];
$bookingId = $_POST['bookingid'];

$stmt = $pdo->prepare("SELECT COUNT(*) FROM bookings 
WHERE bid = :bookingId AND uid = :userId");

$stmt->execute(['bookingId' => $bookingId, 'userId' => $userId]);

$result = $stmt->fetchColumn();

if ($result == 0) {
    $pdo=null;
    $stmt=null;
    header("Location: ../view/booking.php?invalidunbook=truee");
    die();
}

$stmt = $pdo->prepare("DELETE FROM bookings WHERE bid = :bookingId");
$stmt->execute(['bookingId' => $bookingId]);

$stmt=null;
$pdo=null;

header("Location: ../view/booking.php?unbook=truee");
die();
