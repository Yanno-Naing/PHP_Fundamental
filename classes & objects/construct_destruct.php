<?php


class MyClass{

    public $var = 4;
    public function __construct(){
        echo 'The class "'. __CLASS__ . '" was initiated!<br>';
    }

    public function __destruct(){
        echo 'the class '.__CLASS__.' was destroyed.<br>';
    }
}

$obj = new MyClass;

unset($obj);

var_dump($obj->var);

echo "The end of the file is reached.<br>";



?>