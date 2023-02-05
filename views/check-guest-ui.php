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
  background-color:gray;
  border-radius:4px;
  padding:5px;
}

.button{
  position:fixed;
  top:600px;
  right:30px;
  background-color:gray;
  height:30px;
  width:70px;
  
  border-radius:4px;
}
</style>


<body>

<div class="main">
<div class="nav">
    <div>GUESTS</div>
    <div>ROOMS</div>
    <div>RESERVATIONS</div>
  </div>
    <div class="container">
        <form method="GET" class="form-container" action="./api/check_if_guest_in_hotel_now.php">
            <label>Enter Guest Number:</label>
            <input type="text" name="guestNumber">
            <input type="submit" class="submit">
        </form>
        <div class="button">Add</div>
    </div>
</div>

</body>
</html>