<?php

#scandir() scan all files in directory

// function outputFiles($path){

//     if(file_exists($path) && is_dir($path)){
//         echo "$path/ <br>";

//         $result = scandir($path);
//         //echo var_dump($result)."<br>";        

//         $files = array_diff($result, array('.','..'));

//         if(count($files)>0){
//             foreach($files as $file){
//                 if(is_file("$path/$file")){
//                     echo $file."<br>";
//                 }elseif(is_dir("$path/$file")){
//                     outputFiles("$path/$file");
//                 }
//             }
//         }else{
//             echo "ERROR: No Files found in directory";
//         }

//     }else{
//         echo "ERROR: Directory does not exist.";
//     }
// }

//outputFiles("mydir");


#glob() 

//print_r(glob("mydir/*"));

function outputFilesGlob($path){

    if(file_exists($path) && is_dir($path)){
        echo "$path/ <br>";

        $result = glob($path."/*");
        //echo var_dump($result)."<br>";        

        if(count($result)>0){
            foreach($result as $file){
                if(is_file("$file")){
                    echo basename($file)."<br>";
                }elseif(is_dir("$file")){
                    outputFilesGlob("$file");
                }
            }
        }else{
            echo "ERROR: No Files found in directory";
        }

    }else{
        echo "ERROR: Directory does not exist.";
    }
}

outputFilesGlob("mydir");