<?php

$color = ["Blue","Red","Green"];

print_r($color);

$age = ["Thuta"=>23, "thurein"=>23, "APSH"=>23];
print_r($age);
print_r($age["Thuta"]);
print "<br>";



# array_key_exists() & isset()

$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4,
    'user'=>null ,
];

var_dump(isset($roles['user']));  // bool(false)
var_dump(array_key_exists('user', $roles)); // bool(false)

print_r("<br>");

# Array Functions
/*
array_shift
array_unshift

array_push
array_pop

array_key_exists
array_keys
*/


#array_keys()

$numbers = [10, 20, 30];

$keys = array_keys($numbers);
print_r($keys);

//assoc array
$user = [
	'username' => 'admin',
	'email' => 'admin@phptutorial.net',
	'is_active' => '1'
];

$akeys = array_keys($user);
print_r($akeys);

// array_keys with valued search
$rptKey = array_keys($user, 'admin');
echo $rptKey[0];