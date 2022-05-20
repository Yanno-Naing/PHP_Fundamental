<?php
require 'auth.php';
require('config.php');
//var_dump($link);

    $nameErr = $addressErr = $salaryErr = "";
    $name = $address = $salary = "";

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        if(!empty($_GET['id'])){
            $id = $_GET['id'];

            $sql = "SELECT * FROM employee_details WHERE id=$id";

            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    #output data with the assoc array.
                    $row = mysqli_fetch_assoc($result);
                    
                    $name = $row['name'];
                    $address = $row['address'];
                    $salary = (int) $row['salary'];

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


    }elseif($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
          $nameErr = "Please enter a name";
        } else {
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
            $nameErr = "Only letters and white space allowed";
          }else{
            $name = $_POST['name'];
          }
        }
      
        if (empty($_POST["address"])) {
          $addressErr = "Please enter an address";
        } else {
          $address = $_POST["address"];
        }

        if(empty($_POST['salary'])){
            $salaryErr = "Please enter the salary amount";
        }elseif(!is_numeric($_POST['salary'])){
            $salaryErr = "Please enter digits for the salary";
        }else{
            if($_POST['salary'] < 0){
                $salaryErr = "Please enter a positive integer value";
            }else{
                $salary = $_POST['salary'];
            }
        }

        if((!empty($name)) && (!empty($address)) && (!empty($salary))){

            $sql = 'UPDATE employee_details SET name=?,address=?,salary=? WHERE id=?';

            if($stmt = mysqli_prepare($link, $sql)){
                
                //echo $_POST['name'];
                mysqli_stmt_bind_param($stmt, 'ssii', $name, $address, $salary, $id);

                $name = $_POST['name'];
                $address = $_POST['address'];
                $salary = $_POST['salary'];
                $id = $_POST['id'];

                mysqli_stmt_execute($stmt);
                echo "Records added successfully.";

            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            } 

            mysqli_stmt_close($stmt);

            mysqli_close($link);

            header("location: employee_home.php");
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
        <h1>Update Record</h1>
        <p>Please edit the input values and submit to update the record.</p>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                value="<?php echo ($name)?: ""; ?>">
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($nameErr)?: ""; ?></div>
            </div>
            <div class="mb-3">
                <label for="address"  class="form-label">Address: </label>
                <textarea name="address" class="form-control" id="address" cols="30" rows="7"><?php echo ($address)?: ""; ?></textarea>
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($addressErr)?: ""; ?></div>
            </div>
            <div class="mb-3">
                <label for="salary"  class="form-label">Salary: </label>
                <input type="number" class="form-control" name="salary" id="salary" 
                placeholder="Salary" min="0" value="<?php echo ($salary)?: ""; ?>">
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($salaryErr)?: ""; ?></div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" >
            <a href="employee_home.php" class="btn btn-default" role="button">Cancel</a>
        </form>
    </div>

</body>
</html>