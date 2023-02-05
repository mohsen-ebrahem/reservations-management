<?php
class Room{
    public $roomNumber;
    public $type;
    private $connection;


    public function __construct($roomNumber,$type){
    $this->roomNumber=$roomNumber;
    $this->type=$type;
    global $connected;
    $this->connection=$connected;
    }


    public function addingToHotel(){
        mysqli_query($this->connection,"INSERT INTO room(roomType) VALUES($this->type )");
    }
   


    public function deleteFromHotel(){
        mysqli_query($this->connection,"DELETE FROM room WHERE roomNumber =$this->roomNumber");
    }


    public function updateRoomInfo(){
        mysqli_query($this->connection,"UPDATE room SET roomNumber=$this->roomNumber, roomType=$this->type where roomNumber=$this->roomNumber");
    }


    public function readRoomInfo(){
        $roomRecord=selectRoomRecordFromDataBase();
        $roomInfo=['roomNumber'=>$roomRecord[0],'roomType'=>$roomRecord[1]];
        return $roomInfo;
    }


    private function selectRoomRecordFromDataBase(){
        $result=mysqli_query($this->connection,"SELECT * from room where roomNumber=$this->roomNumber");
        $room=mysqli_fetch_row($result);
        return $room;
    }
    
    }