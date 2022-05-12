<?php

$mynum = 5;

function selfMultiply(&$num){
    $num*=$num;
}

selfMultiply($mynum);
echo $mynum."<br>";




#create anchor tag php | name arguments only in php 8

function create_anchor(
    $text,
    $href = '#',
    $title = '',
    $target = '_self'
)
{
    $href = $href ? sprintf('href="%s"', $href) : '';
    $title = $title ? sprintf('title="%s"', $title) : '';
    $target = $target ? sprintf('target="%s"', $target) : '';

    return "<a $href $title $target>$text</a>";
}

// only in php 8
// echo create_anchor(
//     "Click the link",
//     "https://www.phptutorial.net/",
//     target:"_blank"
// );


#Variadic functions

function sum()
{
    $numbers = func_get_args();
    //print_r($numbers);
    $total = 0;
    foreach($numbers as $value){
        $total+=$value;
    }

    return $total;
}
echo sum(10, 20) . '<br>'; 
echo sum(10, 20, 30) . '<br>'; 
echo sum(10,20,30,40)."<br>";


//spread operators
function sum1(...$numbers)
{
    //print_r($numbers);
    $total = 0;
    foreach($numbers as $value){
        $total+=$value;
    }

    return $total;
}
echo sum1(10, 20) . '<br>'; 
echo sum1(10, 20, 30) . '<br>'; 
echo sum1(10,20,30,40)."<br>";


//variable arguments and array_sum
function sum2(int ...$numbers): int
{
    return array_sum($numbers);
}

//error sum2(10, 20, "sf", 40);
echo "<pre> variable argument and array_sum \r</pre>".sum2(10, 20, 30, 40);