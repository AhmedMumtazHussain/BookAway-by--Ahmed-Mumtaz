<?php


require_once 'dbh.inc.php';

if(isset($_GET['hid']) && is_numeric($_GET['hid']))
{
    $hid = $_GET['hid'];
    function get_unavalabledates($pdo,$hid)
    {   $stmt = $pdo->prepare("SELECT checkin, checkout
                FROM bookings
                WHERE hid = :hid");
        $stmt->execute(['hid' => $hid]);
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $unavailableDates = [];
        foreach($bookings as $booking)
        {
            $start= new DateTime($booking['checkin']);
            $end= new DateTime($booking['checkout']);
            $interval = new DateInterval("P1D");
            $period = new DatePeriod($start, $interval, $end->modify('+1 day'));
            foreach($period as $date){
                $unavailableDates[] = $date->format('Y-m-d');
            }
        }
        $pdo = null;
        $stmt = null;
        return $unavailableDates;
    }

    $unavailabledates = get_unavalabledates($pdo,$hid);
    echo json_encode($unavailabledates);


} else {
    $pdo=null;
    $stmt=null;
    header("Location: ../view/locations.php");
    die();
}