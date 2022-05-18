<?php

$link = mysqli_connect('localhost','root','','demo');

if($link === false){
    die('ERROR: Could not connect. '.mysqli_connect_error());
}

$sql = 'INSERT INTO persons( first_name, last_name, email) VALUES ( ?,?,? )';

if($stmt = mysqli_prepare($link, $sql)){
    
    mysqli_stmt_bind_param($stmt, 'sss', $first_name, $last_name, $email);

    $first_name = "kyaw kyaw";
    $last_name = "lin";
    $email = "kyawlin@gmail.com";

    mysqli_stmt_execute($stmt);

    $first_name = "Aye";
    $last_name = "Aye";
    $email = "aye2@gmail.com";

    mysqli_stmt_execute($stmt);
    echo "Records added successfully.";

}else{
    echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
} 

mysqli_stmt_close($stmt);

mysqli_close($link);