<?php

$a = 0.56;
$b = 3;

//echo $b + $a;

echo $a+=$b;

#Assignment Operator
#Arithmetic Operator
#Comparasion Operator
#Increment or decrement Operator
#Logical Operator

#Null Coalescing Operator
$username; //undefined or null
$name = $username ?? 'anonymous';
echo $name;

#Ternary Operator
$age = 15;
echo ($age < 18)? "Child":"Adult";