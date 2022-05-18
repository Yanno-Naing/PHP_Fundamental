<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .heading{
            overflow: hidden;
            width:100%;
        }
        .heading h1{
            width: 50%;
            float: left;
        }
        .heading a{
            float:right;
            margin-top: 0.5em;
        }
        .container{
            width:80%;
            margin: 5em auto;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <div class="col-6 heading" >
        <h1>Employee Details</h1>
        <a href="create_employee.php" class="btn btn-success" role="button">Add New Employee</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
            $sql = 'SELECT * FROM employee_details';
            $no = 1;
            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    #output data with the assoc array.
                    while($row = mysqli_fetch_assoc($result)){
                        //print_r($row); die();
                        echo "<tr>";
                        echo "<th>".$no."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['salary']."</td>";
                        echo "<td></td>";
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
    </div>
    


</body>
</html>