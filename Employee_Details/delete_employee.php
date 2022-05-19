<?php
require('config.php');
//var_dump($link);

    if($_SERVER['REQUEST_METHOD']=='GET'){
        
        if(!empty($_GET['id'])){

            $id = $_GET['id'];

        }else{
            header("location: error.php"); 
        }

    }elseif($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['id'])){

            $id = $_POST['id'];
            $sql = "DELETE FROM employee_details WHERE id=$id";

            if(mysqli_query($link, $sql)){
                echo 'Records Deleted Successfully';

                header("location: employee_home.php");
            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            }

            mysqli_close($link);
        }else{
            header("location: error.php");
        }
        
    }
    else{
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
        <h1>Delete Record</h1>

        <form action="delete_employee.php" method="post" >
            <div class="alert alert-success" role="alert">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <p>Are you sure you want to delete this record?</p>
                <input type="submit" name="submit" class="btn btn-danger" value="Yes">
                <a href="employee_home.php" class="btn btn-primary" role="button">No</a>
            </div>
        </form>
        
    </div>

</body>
</html>