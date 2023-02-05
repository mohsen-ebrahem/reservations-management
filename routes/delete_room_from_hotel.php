<?php
require __DIR__."../../model/room.php";
include __DIR__."../../connect/connect_to_mySQL.php";
include __DIR__."../../controllers/roomController.php";

$newRoom=new Room($_GET['roomNumber'],null,$connected);
   $newRoom->deleteFromHotel();
    response('deleted',null);


?>