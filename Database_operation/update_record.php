<?php

$link = mysqli_connect('localhost','root','','demo');

if($link === false){
    die('ERROR: Could not connect. '.mysqli_connect_error());
}

$sql = 'UPDATE persons SET first_name="perk" WHERE email="peterparker@gmail.com"';

if(mysqli_query($link, $sql)){
    echo 'Records Updated Successfully';
}else{
    echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
}

mysqli_close($link);