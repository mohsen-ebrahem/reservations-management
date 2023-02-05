<?php

class Reservation{
    public $reservationNumber;
    public $reservedRoomNumber;
    public $guestNumber;
    public $reservationCost;
    public $incomeDate;
    public $exitDate;
    private $connection;

    public function __construct(){
        if(func_num_args()==4)
        $this->constructorWithFourArgs(func_get_args());
        else if(func_num_args()==1)
        $this->constructorWithOneArg(func_get_args());

        global $connected;
        $this->connection=$connected;
    }


    public function constructorWithFourArgs($arguments){
        $this->reservedRoomNumber=$arguments[0];
        $this->guestNumber=$arguments[1];
        $this->incomeDate=$arguments[2];
        $this->exitDate=$arguments[3];
        $differenceBetweenDates=date_diff(new DateTime($this->exitDate),new DateTime($this->incomeDate));
        $this->reservationCost=intval($differenceBetweenDates->format('%a days'))*165;
    }


    public function constructorWithOneArg($arguments){
        $this->guestNumber=$arguments[0];
    }


    public function addingToHotel(){
        mysqli_query($this->connection,"INSERT INTO reservation(guestNumber,roomNumber,incomeDate,exitDate,reservationCost)VALUES($this->guestNumber,$this->reservedRoomNumber,'$this->incomeDate','$this->exitDate',$this->reservationCost)");

        print(mysqli_error($this->connection));
    }

    public function deleteReservation(){
        $result=mysqli_query($this->connection,"DELETE FROM reservation WHERE guestNumber=$this->guestNumber");
    }


    public function updateReservation(){
        mysqli_query($this->connection,"UPDATE reservation SET guestNumber=$this->guestNumber,roomNumber=$this->reservedRoomNumber,reservationCost=$this->reservationCost, incomeDate='$this->incomeDate',exitDate='$this->exitDate' WHERE reservationNumber=$this->reservationNumber");  
    }

}