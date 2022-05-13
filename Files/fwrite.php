<?php

#Writing File

$file1 = "newnote.txt";
$data = "The quick brown fox jumped over the lazy dog.";

//$handle = fopen($file1, "w") or die("ERROR");
$handle = fopen($file1, "a+") or die("ERROR");

//fwrite($handle, $data) or die("ERROR: Cannot write the file.");

$content = fread($handle, "300") or die("ERROR");
echo $content;

fclose($handle);


// #writing without opening file
// $datay = "yannananana";
// //file_put_contents($file1, $datay) or die("ERROR: Cannot write the file.");
// // file_put_contents($file1, " nainanganna", FILE_APPEND) or die("ERROR: Cannot write the file.");

// #rename file 
// //rename($file1, "newnote.txt") or die("ERROR: Cannot write the file.");

// #unlink file // delete file
// $file = "newtxt.txt";

// if(file_exists($file)){

//     if(unlink($file)){
//         echo "File deleted.";
//     }else{
//      echo "ERROR: Cannot delete the file.";
//     }
// }else{
//     echo "ERROR: File does not exist.";
// }
