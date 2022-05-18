<?php

$link = mysqli_connect('localhost','root','','demo');

if($link === false){
    die('ERROR: Could not connect. '.mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="tablestyle.css" >
</head>
<body>
    <title>Persons</title>
    <table>
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>

        <?php
            $sql = 'SELECT * FROM persons';
            $no = 1;
            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    #output data with the assoc array.
                    while($row = mysqli_fetch_assoc($result)){
                        //print_r($row); die();
                        echo "<tr>";
                        echo "<th>".$no."</th>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                        $no++;
                    }

                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            }
            mysqli_close($link);

        ?>

    </table>
</body>
</html>


