<?php

class RoomController{


public function viewAllRooms(){
    return response('all rooms',$this->retrieveAllRooms());
}



    public function addRoom($roomType){
        $newRoom=new Room(null,$roomType);//we pass null roomNumber because it increases automatically
        $newRoom->addingToHotel();
    }


    public function updateRoomInfo($roomNumber, $roomType){
        $newRoom=new Room($roomNumber, $roomType);
        $newRoom->updateRoomInfo();
    }

    function retrieveAllRooms(){
        $result=$this->selectAllRoomsRecordsFromDataBase();
        $rooms=[];
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
            $room=['roomNumber'=>$row[0],'roomType'=>$row[1],'roomState'=>$this->isThisRoomBusyOrEmpty($row['roomNumber'])];
          $rooms[]=$room;
        }
        return $rooms;
    }
    
    
    function selectAllRoomsRecordsFromDataBase(){
        global $connected;
        return mysqli_query($connected,'SELECT * FROM room');
    }
    
    
    
    function isThisRoomBusyOrEmpty($roomNumber){
        $result=$this->selectRoomReservationsDatesFromDataBase($roomNumber);
        while($row=mysqli_fetch_array($result))
            if($this->isThisDateReservedNowForThisRoom($row[0],$row[1]))return true;
        return false;
    }
    
    
    
    function selectRoomReservationsDatesFromDataBase($roomNumber){
        global $connected;
        return mysqli_query($connected,"SELECT incomeDate,exitDate FROM reservation where roomNumber=$roomNumber");
    }
    
    
    function isThisDateReservedNowForThisRoom($incomeDate,$exitDate){
        $currentDate=new DateTime();
        return (new DateTime($incomeDate)<=$currentDate & new DateTime($exitDate)>=$currentDate);
    }

}