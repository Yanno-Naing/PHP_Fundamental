<?php

function division($dividend, $divisor){
    if($divisor == 0){
        throw new Exception("Divison by zero.");
    }else{
        $quotient = $dividend / $divisor;
        return $quotient;
    }
}


try{

    echo Division(34, 7);
    echo "<br>";
    echo Division(34, 0);
    

    echo "Successfully divided.";

}catch(Exception $e){
    echo $e->getMessage();
}