<?php 
function isWeekend(DateTime $d){
      if($d ->format('l') === 'Sunday'){
        return "Hôm nay là chủ nhật.\n";
      }
      else{
        return "Hôm nay không phải là chủ nhật.\n";
      }
}
function checkDay20AndMeeting(){
  $a = 0;
        if(date('d') !== '20'){ 
          echo "Ngày hôm nay không phải ngày 20. \n";
            if (date('d') < 12){              
               $a = 12 - date('d');
            }
            else{
              $a = date('t') - date('d') + 12;
            }            
           echo "Còn $a ngày nữa đến ngày 20 kế tiếp.\n";
        }
        elseif(date('l') === 'Sunday'){
          echo "Có lịch hẹn vào ngày hôm nay.\n";
        }
        else{
          $nextSunday = date('d-m-Y',strtotime("next Sunday"));
          $b = 7 - date('N');
          echo "Lịch hẹn sẽ dời đến $nextSunday . Còn $b ngày nữa đến lịch hẹn.\n";
        }
}


