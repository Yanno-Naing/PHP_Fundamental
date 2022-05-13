<?php

// $dir = "testdir";

// if(!file_exists($dir)){
//     if(mkdir($dir)){
//         echo "Directory created successfully";
//     }else{
//         echo "ERROR: Directory could not be created";
//     }
// }else{
//     echo "ERROR: Directory already exists.";
// }


#copying file from one location to another

$file = "example.txt";
$desfile = "testdir/test.txt";

if(file_exists($file)){
    if(copy($file,$desfile)){
        echo "File copied successfully";
    }else{
        echo "ERROR: File could not be copieds";
    }
}else{
    echo "ERROR: File does not exist.";
}