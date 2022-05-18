<?php

require 'Rectangle.php';

class Square extends Rectangle{

    public function isSquare(){
        if($this->length == $this->width){
            return true;
        }else{
            return false;
        }
    }
}

$obj = new Square;

$obj->length = 23;
$obj->width = 56;

if($obj->isSquare()){
    echo "The area of the square is ";
}else{
    echo "The area of the rectangle is ";
}

echo $obj->getArea();