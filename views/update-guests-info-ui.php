<html>
<head>
<link rel="stylesheet" href="../css files/add-room-style.css">
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
        <form method="POST" class="form-container" action="../routes/update_guest_info.php?guestNumber=<?php print $_GET['guestNumber']?>">
            <label>First Name:</label>
            <input name="firstName" type="text" required value=<?php print $_GET['firstName'] ?> >
            <label>Last Name:</label>
            <input name="lastName" type="text" required value=<?php print $_GET['lastName'] ?>>
            <label>Phone:</label>
            <input name="phone" type="text" required value=<?php print $_GET['phone'] ?>>

            <label>Nationality:</label>
            <input name="nationality" type="text" required value=<?php print $_GET['nationality'] ?>>

            <label>Room Number</label>
            <input name="guestRoomNumber" type="text" required value=<?php print $_GET['roomNumber'] ?> >
            <input type="submit" class="submit" value="Update">
        </form>
      
    </div>
</div>

</body>
</html>