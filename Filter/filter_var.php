<?php

$comment = "<h1>This is heading</h1> ";

$sanitizedComment = filter_var($comment, FILTER_SANITIZE_STRING);

echo filter_var($comment, FILTER_SANITIZE_STRING);
echo $sanitizedComment;



$int = -11;
$options["options"] = ["min_range"=> -20,"max_range"=>100];
var_dump(filter_var($int, FILTER_VALIDATE_INT, $options));



$email = "    sdfa@gmail.com  </br>\t  ";

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo $email;
}else{
    echo "error";
}

var_dump(!filter_var($email, FILTER_VALIDATE_EMAIL)===false);


$specialChar= "<h1> Hello World </h1> ";

echo filter_var($specialChar, FILTER_SANITIZE_SPECIAL_CHARS);


//echo "&#4128;";

