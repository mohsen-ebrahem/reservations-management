<?php
header("Location:../views/give-me-rooms-ui.php");
include __DIR__."../../model/room.php";
include __DIR__."../../paths/path.php";
include __DIR__."../../controllers/RoomController.php";

$roomController=new RoomController();
$roomController->updateRoomInfo($_GET['roomNumber'],$_POST['roomType'],$connected);


?>