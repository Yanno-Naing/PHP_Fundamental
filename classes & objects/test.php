<?php
require "Rectangle.php";

$obj = new Rectangle;

echo $obj->length;
echo $obj->width;

$obj->length = 34;
$obj->width = 43;

echo $obj->getPerimeter();
echo $obj->getArea();
