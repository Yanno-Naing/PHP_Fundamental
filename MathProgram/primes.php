<?php


function prime_number($var){

    $prime = true;
    for($i=2;$i<$var;$i++){
        if($var%$i==0){
            $prime=false;
            break;
        }
    }
    if($prime){
        return "$var is a prime number.";
    }else{
        return "$var is not a prime number.";
    }
}

echo prime_number(11);