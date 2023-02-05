<?php
require __DIR__."../../routes/give_me_all_reservations.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css files/give-reservation-style.css">
<style>

</style>


</head>
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


<body>

<div class="main">
<div class="nav">
<div><a href="./give-me-guests-ui.php">GUESTS</a></div>
    <div><a href="./give-me-rooms-ui.php">ROOMS</a></div>
    <div><a href="./give-me-reservations-ui.php">RESERVATIONS</a></div>
  </div>
    <div class="container">
      <?php
      $reservations= json_decode(giveMeAllReservations())->data;
      for($i=0; $i<count($reservations) ; $i++){
        print "
      <div class='guest'><div class='content'>{$reservations[$i]->guestNumber}
      <div class='con-foot'>
        <div>{$reservations[$i]->roomNumber}</div><div>{$reservations[$i]->incomeDate}</div><div>{$reservations[$i]->exitDate}</div>
    </div>
    </div>
    <div class='set'>
    <a href='../routes/delete_booking.php?guestNumber={$reservations[$i]->guestNumber}'>Delete</a>
    </div>
  </div>";
      }
      //<a href='./update-reservation-info-ui.php?reservationNumber={$reservations[$i]->reservationNumber}&reservedRoomNumber={$reservations[$i]->roomNumber}&guestNumber={$reservations[$i]->guestNumber}&incomeDate={$reservations[$i]->incomeDate}&exitDate={$reservations[$i]->exitDate}'>Update</a>
      ?>
       <div class="button"><a href="./book_room_ui.php">Add</a></div>


    </div>
</div>

</body>
</html>