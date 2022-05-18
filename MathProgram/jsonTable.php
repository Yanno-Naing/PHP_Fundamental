<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
    
    <?php
        $json = '[
            {
            "name" : "John Garg",
            "age"  : "15",
            "school" : "Ahlcon Public school"
            },
            {
            "name" : "Smith Soy",
            "age"  : "16",
            "school" : "St. Marie school"
            },
            {
            "name" : "Charle Rena",
            "age"  : "16",
            "school" : "St. Columba school"
            }
        ]';
        
        $arr = json_decode($json,true);
        //var_dump($arr);
            
    ?>

    <table table-border="1px solid">
        
        <tr>
        <?php
            foreach($arr[0] as $key=>$value){
                echo "<th> $key </th>";
            }
        ?>
        </tr>
        <?php

            foreach($arr as $data){
                echo "<tr>";
                foreach($data as $value){   
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
        

        ?>
    </table>
</body>
</html>