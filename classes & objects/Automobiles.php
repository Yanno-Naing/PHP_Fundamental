<?php

class Automobile{
    public $fuel;
    protected $engine;
    private $transmission;


}

class Car extends Automobile
{
    public function __construct(){
        echo 'The class was initiated!<br>';
    }
    //$engine = "V8";
    public function getEngine(){
        return $this->engine;
    }
    
}


$mobile = new Automobile;

$car = new Car;

//echo $mobile->transmission;

var_dump($car->getEngine());

$car->transmission = "dfsfsf";

//print_r($car);
echo "<br>";

foreach($car as $key=>$val){
    echo $key ."=>".$val."<br>";
}