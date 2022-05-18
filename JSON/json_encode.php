<?php

$marks = array("Peter"=>34,"Harry"=>45,"John"=>34,"Clark"=>74);

echo json_encode($marks);

$colors = array("Red","Green","Blue","Orange");

var_dump(json_encode($colors, JSON_FORCE_OBJECT));

echo "<br>";

#JSON_DECODE

$json = '{"Peter":34,"Harry":45,"John":34,"Clark":74}';

$obj = json_decode($json);

echo $obj->Peter;
foreach($obj as $key=>$val){
    echo $key ."=>".$val."<br>";
}


$arr = json_decode($json, true);
print_r($arr);