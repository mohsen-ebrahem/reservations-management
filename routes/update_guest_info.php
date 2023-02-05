<?php


header("Location:../views/give-me-guests-ui.php");
require __DIR__."../../model/guest.php";
//include __DIR__."../../paths/path.php";
include __DIR__."../../controllers/guestController.php";


$guestController=new GuestController();
$guestController->updateGuestInfo($_GET['guestNumber'],$_POST['firstName'],$_POST['lastName'],$_POST['phone'],$_POST['nationality'],$_POST['guestRoomNumber']);


?>