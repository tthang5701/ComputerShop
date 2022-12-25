<?php 

class time {
  public function getDateTimeFormat($time){
    return date('d/m/Y',strtotime($time));
  }
  public function getCurrentDate(){
    return date('d/m/Y');
  }
}
