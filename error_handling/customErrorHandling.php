<?php

function customError($errno, $errstr){
    echo "<b>ERROR: </b> [$errno] $errstr";
}


set_error_handler("customError");


echo $test;

echo $php;