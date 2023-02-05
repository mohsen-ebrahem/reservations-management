<?php
    require __DIR__."../../model/guest.php";
    include __DIR__."../../connect/connect_to_mySQL.php";
    require __DIR__."../../check_response/response.php";
    include __DIR__."../../controllers/guestController.php";


function giveMeGuestInfo($guestNumber){
    $guestController=new GuestController();
    return $guestController->readGuestInfo($guestNumber);
}

?>