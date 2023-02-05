<?php
require __DIR__.'../api/read_guest_info.php';
?>
<html>
<head>
<link rel="stylesheet" href="../css files/give-single-guest-info-ui.css">
<style>
span{
  font-size:medium;
}
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
      $guest=json_decode(giveMeGuestInfo($_GET['guestNumber']))->data;
      
      print("
      <div class='guest'><div class='content'>Name: {$guest->firstName} {$guest->lastName}</br><span>Room Number: {$guest->guestRoomNumber}</span><span>Phone: {$guest->phone}</span><span>Nationality: {$guest->nationality}</span></div>
        <div class='set'>
        <a href='./api/delete_guest.php?guestNumber={$guest->guestNumber}'>Delete</a>
        <a href='./update-guests-info-ui.php?guestNumber={$guest->guestNumber}&firstName={$guest->firstName}&lastName={$guest->lastName}&phone={$guest->phone}&nationality={$guest->nationality}&roomNumber={$guest->guestRoomNumber}'>Update</a>
      </div>
      </div>
      ");

      ?>
     
      
    </div>
</div>

</body>
</html>