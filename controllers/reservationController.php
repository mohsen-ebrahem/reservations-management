<?php

class ReservationController{



    public function viewAllReservations(){
        return response('all guests',$this->retrieveAllReservations());
    }


    public function addReservation($availableRoomNumber, $guestNumber, $incomeDate, $exitDate){
        $newReservation=new Reservation($availableRoomNumber, $guestNumber, $incomeDate, $exitDate,);
        $newReservation->addingToHotel(); 
    }

    public function deleteReservation($guestNumber){
        $newReservation =new Reservation($guestNumber);
        $newReservation->deleteReservation();
    }

    
function retrieveAllReservations(){
    $reservations=[];
    $result=$this->selectReservationsFromDataBase();
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
            $guest=['reservationNumber'=>$row['reservationNumber'], 'guestNumber'=>$row['guestNumber'], 'roomNumber'=>$row['roomNumber'], 'incomeDate'=>$row['incomeDate'], 'exitDate'=>$row['exitDate'], 'reservationCost'=>$row['reservationCost'],];
            $reservations[]=$guest;
        }
        return $reservations;
    
    }
    
    function selectReservationsFromDataBase(){
        global $connected;
        return mysqli_query($connected,'SELECT * FROM reservation');
    }

}
?>