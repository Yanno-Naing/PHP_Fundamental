<?php

class Greeting{
    private $greeting = "Hello All, I am ";

    public function sayGreeting($name){
        return $this->greeting . $name .". <br>";
    }
}

$obj = new Greeting;

echo $obj->sayGreeting("Yanno");

