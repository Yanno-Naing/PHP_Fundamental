<?php
require('config.php');
//var_dump($link);

    if($_SERVER['REQUEST_METHOD']=='GET'){
        
        if(!empty($_GET['id'])){
            $id = $_GET['id'];

            $sql = "SELECT * FROM employee_details WHERE id=$id";

            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    #output data with the assoc array.
                    $row = mysqli_fetch_assoc($result);

                    mysqli_free_result($result);
                }else{
                    header("location: error.php"); 
                }
            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            }
            mysqli_close($link);

        }else{
            header("location: error.php"); 
        }

    }else{
        header("location: error.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
</head>
<body>
    <div class="form-container">
        <h1>View Record</h1>

        <div class="content-container">
            <h4>Name: </h4>
            <p><?php echo ($row['name'])?:""; ?></p>
            <h4>Address: </h4>
            <p><?php echo ($row['address'])?:""; ?></p>
            <h4>Salary: </h4>
            <p><?php echo ($row['salary'])?:""; ?></p>
            <a href="employee_home.php" class="btn btn-primary" role="button">Back</a>
        </div>
        
    </div>

</body>
</html>