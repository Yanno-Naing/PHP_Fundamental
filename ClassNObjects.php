<?php

class greeting{
    private $str= "Hello World!";

    function show_greeting(){
        return $this->str;
    }
}

$message = new greeting;
#Error var_dump($message->str);
echo $message->show_greeting();

