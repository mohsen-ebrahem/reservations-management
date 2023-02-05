<?php
require __DIR__."../../connect/connect_to_mySQL.php";
require __DIR__."../../check_response/response.php";

print isThisGuestInHotelNow($_GET['guestNumber'])?response('founded now',null):response('not found now',null);


function isThisGuestInHotelNow($guestNumber){
    $result=selectAllGuestReservationsDateFromDataBase($guestNumber);
    while($row=mysqli_fetch_array($result))
        if(isTheCurrentDateInReservationDateDuration($row[0],$row[1]))return true;
    return false;
}



function selectAllGuestReservationsDateFromDataBase($guestNumber){
    global $connected;
    return mysqli_query($connected,"SELECT incomeDate,exitDate FROM reservation where guestNumber=$guestNumber");
}

function isTheCurrentDateInReservationDateDuration($incomeDate,$exitDate){
    $currentDate=new DateTime();
    return (new DateTime($incomeDate)<=$currentDate & new DateTime($exitDate)>=$currentDate);
}