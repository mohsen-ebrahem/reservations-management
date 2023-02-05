<?php

include __DIR__."../../connect/connect_to_mySQL.php";
require __DIR__."../../check_response/response.php";
include __DIR__."../../controllers/reservationController.php";



function giveMeAllReservations(){
$reservationController=new ReservationController();
return $reservationController->viewAllReservations();
}

?>