<?php

$file = "user_file.txt";

if(file_exists($file)){

    $handle = fopen("user_file.txt", "r") or die("ERROR: Cannot open the file.");
    //echo var_dump($handle). "<br>";

    //echo filesize($file);
    $content = fread($handle, filesize($file));
    echo $content."<br>";

    fclose($handle);
}else{
    echo "ERROR: File does not exist.";
}


#readfile() , file_get_contents(), file()      these functions doesn't need file to be opened.

$content5 = readfile($file);
echo $content5 ."<br>";

$content2 = file_get_contents($file);
echo $content2."<br>";

$arr = file($file);
foreach($arr as $line){
    echo $line;
}



