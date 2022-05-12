<?php

$arr = ["Red","Green","Blue"];
$age= ["Yan"=>23, "Thuta"=>23, "Thurein"=> 23];

// $arr_len = count($arr);
// for($i=0; $i<$arr_len; $i++){
//     echo $arr[$i]."<br>";
// }

foreach($arr as $value){
    echo $value."<br>";
}

foreach($age as $name => $value){
    echo $name." = ".$value."<br>";
}
