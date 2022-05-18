<?php


function printValues($arr){
    global $count;
    global $values;

    if(!is_array($arr)){
        die('ERROR: ');
    }

    foreach($arr as $key=>$val){
        if(is_array($val)){
            printValues($val);
        }else{
            $values[]= $val;
            $count++;
        }
    }

    return array('total'=>$count,'values'=>$values);
}


$json = '{
    "book":{
        "name":"Harry Potter and the Goblet of Fire",
        "author":"J. K. Rowling",
        "year": 2000,
        "characters":["Harry Potter","Hermione Granger","Ron Weasley"],
        "genre":"Fantasy Fiction",
        "price":{
            "paperback":"$10.23","hardcover":"$20.23","kindle":"$3.34"
        }
    }
}';

$arr = json_decode($json,true);

$result = printValues($arr);
echo $result['total']."<br>";
echo implode("<br>",$result["values"]);


$var = 45;

var_dump((bool)$var);

