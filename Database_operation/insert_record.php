<?php

$link = mysqli_connect('localhost','root','','demo');

if($link === false){
    die('ERROR: Could not connect. '.mysqli_connect_error());
}

$sql = 'INSERT INTO persons( first_name, last_name, email) VALUES ("Peter", "Parker", "peterparker@gmail.com")';

if(mysqli_query($link, $sql)){
    echo 'Record inserted successfully';
}else{
    echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
}

mysqli_close($link);