<?php


function BDCalculator($day,$month,$year){
    $curryear = (int)date("Y");
    $oneday = 1*24*60*60;

    $bdtimestamp = mktime(0,0,0,$month,$day,$curryear);

    $currtime = time();

    // echo $bdtimestamp ."<br>";
    // echo $currtime ; die();

    if($bdtimestamp > $currtime){

    }elseif(($currtime - $bdtimestamp)< $oneday){
        echo "Happy Birthday!!!<br>";
    }elseif($bdtimestamp < $currtime){
        $bdtimestamp = mktime(0,0,0,$month,$day,($curryear+1));
    }
        
    $timediff = $bdtimestamp - $currtime;
    $dayleft = $timediff/$oneday;

    echo "Your Birthday is ".ceil($dayleft)."days left";
}

BDCalculator(17,3,2000);
