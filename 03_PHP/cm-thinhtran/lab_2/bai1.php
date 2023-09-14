<?php
    function isWeekend($date) {
        return ($date->format("w") == 0 ? true : false) ;
    }

    function getNearestSunday($date){
        $dateNew = new DateTime($date->format("Y-m-d"));
        do{
            if(isWeekend($dateNew)){
                return $dateNew;
            }
            $dateNew->modify('+1 day');
        }while(true);
    }

    function getNextDateWithSpecifyDay($date, $day){
        $dateNew = new DateTime($date->format("Y-m-d"));
        do{
            if($dateNew->format("d") == $day){
                return $dateNew;
            }
            $dateNew->modify('+1 day');
        }while(true);
    }

    function validateMeetDate($date, $meetDay){
        if($date->format("d") == $meetDay){
            if(isWeekend($date)){
                print_r("Have meet today!!");
            }
            else{
                print_r("Lịch hẹn sẽ dời đến ngày ".getNearestSunday($date)->format("Y-m-d"));
            }
        }
        else{
            print_r("Không phải là ngày hẹn \n");
            $diff=date_diff($date,getNextDateWithSpecifyDay($date, $meetDay));
            print_r($diff->format("%a days")." ngày nữa đến ngày ".$meetDay);
        }
    }

    $dateInString = "2023-09-10";
    $date = new DateTime($dateInString);
    $meetDay = 20;
    echo "Ngày ". $date->format("Y-m-d")." có phải là chủ nhật: ".isWeekend($date)."\n";
    validateMeetDate($date, $meetDay);
?>