<?php

// $arr = [23,54,64,34,65];

// $maxval = 0;
// $arrlen = count($arr);

// for($i=0; $i<$arrlen; $i++){
//     if($arr[$i]>$arr[$i+1]){
//         $maxval = $arr[i];
//     }else{
//         $maxval = $arr[$i+1]
//     }
// }


$marks1 = array(360,310,310,330,313,375,456,111,256);
$marks2 = array(350,340,356,330,321);
$marks3 = array(630,340,570,635,434,255,298);

// $arr = ["marks1"=>0, "marks2"=>0, "marks3"=>0];

// $arr["marks1"] = sum_array($marks1);
// $arr["marks2"] = sum_array($marks2);
// $arr["marks3"] = sum_array($marks3);


// function sum_array($arr){
//     return array_sum($arr);
// }

// $maxval = max($arr);

// $highmarks = array_keys($arr, $maxval);
// echo "The highest total mark: ".$highmarks[0];
$arrays = array_merge($marks1,$marks2,$marks3);

echo "Max value from three arrays: ".max($arrays) ."<br>";
echo "Min value from three arrays: ".min($arrays);



