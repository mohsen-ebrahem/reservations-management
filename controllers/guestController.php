<?php

class GuestController{

    

    public function addGuest($firstName,$lastName,$phone,$nationality,$guestRoomNumber){
        $guest=new Guest($firstName,$lastName,$phone,$nationality,$guestRoomNumber);
        $guest->addingToHotel();
        return $guest->guestNumber;
    }


    public function viewAllGuests(){
        return response('all guests',$this->retrieveAllGuests());
    }


    public function deleteGuest($guestNumber){
        $guest=new Guest($guestNumber);
        $guest->deleteGuestFromHotel();
    }

    function readGuestInfo($guestNumber){

        $guest=new Guest($guestNumber);
        return response('guest',$guest->readGuestInfo());
    
       }

    function updateGuestInfo($guestNumber, $firstName, $lastName, $phone, $nationality,$guestRoomNumber){
        $guest=new Guest($guestNumber, $firstName, $lastName, $phone, $nationality,$guestRoomNumber);
        $guest->updateGuestInfo();
    }


    public function retrieveAllGuests(){
    
        $result=$this->selectGuestsFromDataBase();
        $guests=[];
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
            $guest=['guestNumber'=>$row['guestNumber'], 'firstName'=>$row['firstName'], 'lastName'=>$row['lastName'], 'guestRoomNumber'=>$row['guestRoomNumber'], 'phone'=>$row['phone'], 'nationality'=>$row['nationality']];
            $guests[]=$guest;
        }
        return $guests;
    }
    
    function selectGuestsFromDataBase(){
      global $connected;
        return mysqli_query($connected,'SELECT * FROM guest');
    }
}

?>