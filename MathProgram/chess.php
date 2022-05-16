<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table{
            width: 270px;
            border:1px solid;
        }
        tr,td{
            border:1px solid;
        }
    </style>
</head>
<body>
    <table>

        <?php
            $flag=1;
            for($i=1;$i<=8;$i++){
                echo "<tr height='30px'>";
                if($i%2==0){
                    $flag=0;
                }else{
                    $flag=1;
                }
                for($j=1;$j<=8;$j++){
                    if($flag===1){
                        echo "<td width='30px' height='30px' style='background-color:black'></td>";
                        $flag=0;
                    }elseif($flag===0){
                        echo "<td width='30px' height='30px'></td>";
                        $flag=1;
                    }
                    
                }
                echo "</tr>";
            }

        ?>
    </table>
</body>
</html>