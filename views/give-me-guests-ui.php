<?php

require __DIR__."../../routes/give_me_all_guests.php";

?>
<html>
<head>
<link rel="stylesheet" href="../css files/give-guests-style.css">
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

<body>

<div class="main">
  <div class="nav">
  <div><a href="./give-me-guests-ui.php">GUESTS</a></div>
    <div><a href="./give-me-rooms-ui.php">ROOMS</a></div>
    <div><a href="./give-me-reservations-ui.php">RESERVATIONS</a></div>
  </div>
    <div class="container">
      <?php
      $guests=giveMeAllGuests();
      
      $guestsData=json_decode($guests)->data;
      
   for($i=0; $i<count($guestsData); $i++){
   
    echo ("<div class='guest' onclick=\"{window.location.href='./give-single-guest-info-ui.php?guestNumber={$guestsData[$i]->guestNumber}'}\" ><div class='content'>{$guestsData[$i]->firstName}</br><span>{$guestsData[$i]->guestRoomNumber}</span></div>
    <div class='set'>
    <a href='../routes/delete_guest.php?guestNumber={$guestsData[$i]->guestNumber}'>Delete</a>
    <a href='./update-guests-info-ui.php?guestNumber={$guestsData[$i]->guestNumber}&firstName={$guestsData[$i]->firstName}&lastName={$guestsData[$i]->lastName}&phone={$guestsData[$i]->phone}&nationality={$guestsData[$i]->nationality}&roomNumber={$guestsData[$i]->guestRoomNumber}'>Update</a>
    </div>
  </div>");
   }
      ?>

      <div class="button" ><a href="./add-guest-ui.php">Add</a></div>
     
    </div>
</div>

</body>
</html>