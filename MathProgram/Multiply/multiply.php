<?php

if(isset($_POST['submit'])){

    if(!empty($_POST['num1'])){
        $num = $_POST['num1'];

        for($i=1; $i<=12; $i++){
            $result = $num * $i;
            output($num, $i, $result);
        }
        
    }else{
        echo "Please fill value to multiply.";
    }
}


function output($num, $multi, $result){
    echo $num." * ".$multi." = ".$result. "<br>";
}