<?php

echo __LINE__;




echo __LINE__;
echo __LINE__ ;

echo __FILE__;

echo __DIR__;

function myname(){
    echo __FUNCTION__;
}

myname();

class HelloC{
    function __construct(){
        echo "Instance of ". __CLASS__ ." is created";
    }
}
class Greet{
    function __construct(){
        echo "Instance of ". __CLASS__ ." is created";
    }
}

$obj = new Greet;