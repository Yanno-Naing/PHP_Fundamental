<?php

if(empty($_POST)){

    echo "Please fill input data first.";

}else{
    if((!empty($_POST['first_name'])) && (!empty($_POST['last_name'])) && (!empty($_POST['email']))){

        echo "Data completely received. <br>";

        $link = mysqli_connect('localhost','root','','demo');

        if($link === false){
            die('ERROR: Could not connect. '.mysqli_connect_error());
        }

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO persons( first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";

        //echo $sql; die();

        if(mysqli_query($link, $sql)){
            echo 'Records added successfully to the database.';
        }else{
            echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
        }

        mysqli_close($link);

    }else{
        echo "Please fill all input data.";
    }
}