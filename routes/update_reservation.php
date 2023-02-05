<?php

header("Location:../give-me-reservations-ui.php");
include __DIR__."../../model/reservation.php";
include __DIR__."../../paths/path.php";
$newReservation=new Reservation($_GET['reservationNumber'],$_POST['reservedRoomNumber'],$_POST['guestNumber'],null,$_POST['incomeDate'],$_POST['exitDate'],$connected);

    $newReservation->updateReservation();
    response('updated',null);

?>