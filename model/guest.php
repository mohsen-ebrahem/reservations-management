<?php

class Guest{
    public $guestNumber;
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $nationality;
    public $guestRoomNumber;
    private $connection;
 

    public function __construct(){
        $arguments=func_get_args();
        if(func_num_args()==6){
            $this->constructorWithSixArgs($arguments);
        }
        else if(func_num_args()==5){
            $this->constructorWithFiveArgs($arguments);
        }
        else if(func_num_args()==1){
            $this->constructorWithOneArg($arguments);
        }
        global $connected;
        $this->connection=$connected;
    }

    public function constructorWithSixArgs($arguments){
        $this->guestNumber=$arguments[0];
        $this->firstName=$arguments[1];
        $this->lastName=$arguments[2];
        $this->phoneNumber=$arguments[3];
        $this->nationality=$arguments[4];
        $this->guestRoomNumber=$arguments[5];
    }
    public function constructorWithFiveArgs($arguments){
        $this->firstName=$arguments[0];
        $this->lastName=$arguments[1];
        $this->phoneNumber=$arguments[2];
        $this->nationality=$arguments[3];
        $this->guestRoomNumber=$arguments[4];
    }


    public function constructorWithOneArg($arguments){
        $this->guestNumber=$arguments[0];
    }

public function addingToHotel(){

    $result=mysqli_query($this->connection,"INSERT INTO guest(firstName,lastName,guestRoomNumber,phone,nationality) VALUES('$this->firstName','$this->lastName',$this->guestRoomNumber,'$this->phoneNumber','$this->nationality')");
    $this->guestNumber= mysqli_insert_id($this->connection);
}
  

public function deleteGuestFromHotel(){
    mysqli_query($this->connection,"DELETE FROM reservation where guestNumber=$this->guestNumber");
    mysqli_query($this->connection,"DELETE FROM guest where guestNumber=$this->guestNumber");
}


public function updateGuestInfo(){
    mysqli_query($this->connection,"UPDATE guest SET firstName='$this->firstName',lastName='$this->lastName',phone='$this->phoneNumber',nationality='$this->nationality' WHERE $this->guestNumber =guestNumber");
}




public function readGuestInfo(){
    $guest=$this->selectGuestRecordFromDataBase();
    $guestInfo=['guestNumber'=>$guest[0], 'firstName'=>$guest[1], 'lastName'=>$guest[2], 'guestRoomNumber'=>$guest[3], 'phone'=>$guest[4], 'nationality'=>$guest[5]];
    return $guestInfo;
}


public function selectGuestRecordFromDataBase(){
    $result=mysqli_query($this->connection,"SELECT  * from guest WHERE guestNumber=$this->guestNumber ");
    $guest=mysqli_fetch_row($result);
    return $guest;
}

}
?>