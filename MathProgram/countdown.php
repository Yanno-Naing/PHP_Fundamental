<?php

$countvar = 20;

// for($i=$countvar; $i>=0 ; $i--){
//     echo $i . "<br>";
// }

function countFunc($countvar){
    echo $countvar.", ";
    if($countvar<=0) return;
    countFunc($countvar-1);
}

countFunc($countvar);

?>