<?php

$func = $_POST['submit'];
$result = "";
// echo $num1 . $num2;
// echo $func;

if(!empty($_POST['num1']) && !empty($_POST['num2'])){

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if(isset($func)){
        switch($func){
            case "+":
                $result = plus($num1, $num2); 
                echo $num1. "+" .$num2." = ".$result;
                break;
            case "-":
                $result = minus($num1, $num2); 
                echo $num1. "-" .$num2." = ".$result;
                break;
            case "*":
                $result = multiply($num1, $num2); 
                echo $num1. "*" .$num2." = ".$result;
                break;
            case "/":
                $result = division($num1, $num2); 
                echo $num1. "/" .$num2." = ".$result;
                break;
        }
    }
    
}else{
    echo "Please fill values to operate."; die();
}

function plus($num1, $num2){
    return $num1 + $num2;
}

function minus($num1, $num2){
    return $num1 - $num2;
}

function multiply($num1, $num2){
    return $num1 * $num2;
}

function division($num1, $num2){
    return $num1 / $num2;
}

