<?php

error_reporting(false);

try{
    $file = "somefile.txt";

    $handle = fopen($file,"r");
    if(!$handle){
        throw new Exception("File could not be opened!",5);
    }

}catch(Exception $e){
    echo "Error message: ".$e->getMessage()."<br>";
    echo $e->getFile()."<br>";
    echo $e->getLine()."<br>";
    echo $e->getCode()."<br>";
    echo $e->getTraceAsString()."<br>";
    
}