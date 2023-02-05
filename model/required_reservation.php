<?php
class RequiredReservation{
    public $connection;
    public $requiredRoomType;
    public $requiredRoomIncomeDate;
    public $requiredRoomExitDate;
    private $noRoomCanBeReserved=-1;
    public function __construct($requiredRoomType,$requiredRoomIncomeDate,$requiredRoomExitDate){
        $this->requiredRoomType=$requiredRoomType;
        $this->requiredRoomIncomeDate=$requiredRoomIncomeDate;
        $this->requiredRoomExitDate=$requiredRoomExitDate;
        global $connected;
        $this->connection=$connected;
    }


    
public function isThisRoomAvailable(){
    $result=$this->selectRoomsRecordsForRequiredTypeFromDataBase();
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
      if(($availableRoomNumber=$this->checkIfThisRoomCanBeReserved($row[0]))>=0)//checkIfThisRoomCanBeReserved() return -1 if no available room
      return $availableRoomNumber;
    }
    return $this->noRoomCanBeReserved;
  }
  

  public function selectRoomsRecordsForRequiredTypeFromDataBase(){
    return mysqli_query($this->connection,"SELECT roomNumber FROM room where roomType=$this->requiredRoomType");
  }
  
  
  private function checkIfThisRoomCanBeReserved($roomNumber){
    $result=$this->selectReservationsRecordsForRoomNumberFromDataBase($roomNumber);
    if(mysqli_num_rows($result)==0)//0 mean there is no reservation for this room
      return $roomNumber;
    return $this->isTheseReservationsIncludeRequiredDate($result, $roomNumber);
  }
  

  private function selectReservationsRecordsForRoomNumberFromDataBase($roomNumber){
    return mysqli_query($this->connection,"SELECT * FROM reservation WHERE roomNumber=$roomNumber");
  }
  
  private function isTheseReservationsIncludeRequiredDate($result, $roomNumber){ 
    if($this->iterateOverReservationDateAndReturnTrueIfNoDateConflicts($result))return $roomNumber;
    else return $this->noRoomCanBeReserved;
  }

  

  private function iterateOverReservationDateAndReturnTrueIfNoDateConflicts($result){
    $roomReservationState=true;
    while($row=mysqli_fetch_array($result))
      $roomReservationState=$roomReservationState & $this->isThisDateConflictWithRequiredDate($row['incomeDate'],$row['exitDate']);
  return $roomReservationState;
  }
  
  
  
  private function isThisDateConflictWithRequiredDate($in ,$ex){
    //  return (! ($this->requiredRoomIncomeDate >= new DateTime($in) & $this->requiredRoomIncomeDate<= new DateTime($ex)) )
    //  & ! ($this->requiredRoomExitDate >= new DateTime($in) & $this->requiredRoomExitDate <=new DateTime($ex))
    //    & !($this->requiredRoomExitDate  >new DateTime($ex) & $this->requiredRoomIncomeDate <new DateTime($in));
    return   $this->requiredRoomIncomeDate > new DateTime($ex) or $this->requiredRoomExitDate < new DateTime($in);
  }
}