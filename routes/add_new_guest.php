<?php

header("Location:../views/give-me-guests-ui.php");
include __DIR__."../../model/guest.php";
include __DIR__."../../connect/connect_to_mySQL.php";
include __DIR__."../../controllers/guestController.php";



$guestController=new GuestController();
$guestController->addGuest($_POST['firstName'],$_POST['lastName'],$_POST['phone'],$_POST['nationality'],$_POST['guestRoomNumber']);

?>