<?php
require __DIR__."../../routes/give_me_all_room.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css files/give-rooms-style.css">
<style>
.nav{
  font-family:arial;
  height: 150px;
  display: flex;
  flex-direction: column;
   justify-content: space-between; 
    position: fixed;
    top: 300px;
    left:20px;

}

.nav div{
  background-color:rgb(46, 28, 28);
  border-radius:4px;
  padding:5px;
  text-align:center;
}
a{
    text-decoration:none;
    color:white;
    background-color:initial;
}
.button{
  position:fixed;
  top:600px;
  right:30px;
  background-color:rgb(46, 28, 28);
  height:25px;
  width:70px;
  padding:5px;
  border-radius:4px;
  text-align:center;
}
</style>




</head>
<style>

</style>
<body>

<div class="main">
<div class="nav">
<div><a href="./give-me-guests-ui.php">GUESTS</a></div>
    <div><a href="./give-me-rooms-ui.php">ROOMS</a></div>
    <div><a href="./give-me-reservations-ui.php">RESERVATIONS</a></div>
  </div>
    <div class="container">
    <?php
$rooms=giveMeAllRoom();
$r=json_decode($rooms)->data;
for($i=0;$i<count($r);$i++){
  print("<div class='guest'><div class='content'>room  {$r[$i]->roomNumber}
  <div class='con-foot'><div>{$r[$i]->roomType}</div><div>");
  if($r[$i]->roomState)print 'busy';
  else print 'empty';
  
  print("</div></div>
  </div>
  <div class='set'>
  
  <a href='./update-room-info-ui.php?roomNumber={$r[$i]->roomNumber}''>Update</a>
  </div>
  </div>");
}

?>

 <div class="button"><a href="./add_room_ui.php">Add</a></div>
    </div>
</div>

</body>
</html>