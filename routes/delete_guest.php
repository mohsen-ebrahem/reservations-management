<?php

header("Location:../views/give-me-guests-ui.php");
require __DIR__."../../model/guest.php";
include __DIR__."../../connect/connect_to_mySQL.php";
include __DIR__."../../controllers/guestController.php";

$guestController=new GuestController();
$guestController->deleteGuest($_GET['guestNumber']);
?>