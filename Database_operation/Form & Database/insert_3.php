<?php

$link = mysqli_connect('localhost','root','','demo');

if($link === false){
    die('ERROR: Could not connect. '.mysqli_connect_error());
}

$sql = 'INSERT INTO persons( first_name, last_name, email) VALUES ( ?,?,? )';

if($stmt = mysqli_prepare($link, $sql)){
    
    mysqli_stmt_bind_param($stmt, 'sss', $first_name, $last_name, $email);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    mysqli_stmt_execute($stmt);
    echo "Records added successfully.";

}else{
    echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
} 

mysqli_stmt_close($stmt);

mysqli_close($link);