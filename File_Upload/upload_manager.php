<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo "<pre>".print_r($_FILES["photo"])."</pre>"; die();
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        
        $allowed = [ "jpg"=>"image/jpg", "jpeg"=>"image/jpeg", "gif" => "image/gif", "png" => "image/png"];
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a format");
        
        $maxsize = 5 * 1024 * 1024;
        if($filesize>$maxsize) die("Error : File size is larger than the allowed limit,");
    
        if (in_array($filetype, $allowed)){

            if(file_exists("upload/". $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"]. "is already exist.";

            }else{
                move_uploaded_file( $_FILES["photo"]["tmp_name"] , "upload/" . $_FILES["photo"]["name"] );
                echo "Successfuly Uploaded";
            }
        }else{
            echo "Problem to upload. Plx Try Again";
        }

    }else{
        echo "ERROR";
    }
}