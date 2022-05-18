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
            #SELECT column_name(s) FROM table_name LIMIT row_offset, row_count
            $sql = 'SELECT * FROM persons ORDER BY first_name ASC';
            $no = 1;
            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    #output data with the mix of index and assoc array.
                    while($row = mysqli_fetch_array($result)){
                        //print_r($row); die();
                        echo "<tr>";
                        echo "<th>".$no."</th>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
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


