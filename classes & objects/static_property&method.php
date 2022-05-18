<?php

class HelloClass
{
    public static $greeting = "Hello World!";

    public static function sayHello(){
        echo self::$greeting;
    }
}

echo HelloClass::$greeting;
HelloClass::sayHello();

$obj = new HelloClass;

//echo $obj->greeting;
$obj->sayHello();

echo "<br>";

print_r($obj);