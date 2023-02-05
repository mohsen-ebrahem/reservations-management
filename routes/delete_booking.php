<?php

header("Location:../views/give-me-reservations-ui.php");
require __DIR__."../../model/reservation.php";
include __DIR__."../../connect/connect_to_mySQL.php";
require __DIR__."../../check_response/response.php";
include __DIR__."../../controllers/ReservationController.php";

$reservationController=new ReservationController();
$reservationController->deleteReservation($_GET['guestNumber'],$connected);

?>