<?php


for($i=1; $i<=5; $i++){
    for($j=0; $j<$i; $j++){
        echo '*';
    }
    echo "<br>";
}

echo "<br>";

for($i=5; $i>=0; $i--){
    for($j=0; $j<$i; $j++){
        echo '*';
    }
    echo "<br>";
}

echo "<br>";


#Diamond Program
$h=5;
$l=1;
$g=1;
for($i=9; $i>0; $i--){
    
    
    if($i<5){

        if($i==4){
            $l-=2;
        }
        for($j=0; $j<$g; $j++){
            echo '_';
        }
        for($k=1; $k<=$l; $k++){
            echo '*';
        }
        $l-=2;
        $g++;

    }else{

        for($j=$h-1; $j>0; $j--){
            echo "_";
        }
        for($k=1; $k<($l+1); $k++){
            echo '*';
        }
        if($i!=5){
            $l+=2;
        }
        $h--;

    }
    echo "<br>";
}