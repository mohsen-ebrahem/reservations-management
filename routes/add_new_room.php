<?php

header("Location:../views/give-me-rooms-ui.php");
require __DIR__."../../model/room.php";
include __DIR__."../../connect/connect_to_mySQL.php";
include __DIR__."../../controllers/RoomController.php";

$roomController=new RoomController();
$roomController->addRoom($_POST['type']);
?>