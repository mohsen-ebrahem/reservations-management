<?php


header("Location:../views/give-me-reservations-ui.php");
include __DIR__."../../model/reservation.php";
include __DIR__."../../model/required_reservation.php";
include __DIR__."../../model/room.php";
include __DIR__."../../model/guest.php";
include __DIR__."../../connect/connect_to_mySQL.php";
include __DIR__."../../controllers/guestController.php";
include __DIR__."../../controllers/ReservationController.php";

$requiredReservation=new RequiredReservation($_POST['roomType'],new DateTime($_POST['incomeDate']),new DateTime($_POST['exitDate']));

if(($availableRoomNumber= $requiredReservation->isThisRoomAvailable())>=0){//isThisRoomAvailable function return availabe room number and zero if no available room
    
    $guestNumber=addNewGuest($availableRoomNumber);
    bookRoom($availableRoomNumber, $guestNumber);
   
}
else print 'this room is not availabe in this date';




 function addNewGuest($availableRoomNumber){
    $guestController=new GuestController();
    $guestNumber=$guestController->addGuest($_POST['firstName'],$_POST['lastName'],$_POST['phone'],$_POST['nationality'],$availableRoomNumber);    
    return $guestNumber;
}

 function bookRoom($availableRoomNumber, $guestNumber){
    $reservationController=new ReservationController();
    $reservationController->addReservation($availableRoomNumber,$guestNumber,$_POST['incomeDate'],$_POST['exitDate']);
}

?>