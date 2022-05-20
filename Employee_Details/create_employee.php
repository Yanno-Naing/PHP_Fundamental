<?php
require 'auth.php';
require('config.php');
//var_dump($link);

    $nameErr = $addressErr = $salaryErr = "";
    $name = $address = $salary = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            echo "true";
            $sql = 'INSERT INTO employee_details( name, address, salary) VALUES ( ?,?,? )';

            if($stmt = mysqli_prepare($link, $sql)){
                echo "trure";
                echo $_POST['name'];
                mysqli_stmt_bind_param($stmt, 'ssi', $name, $address, $salary);

                $name = $_POST['name'];
                $address = $_POST['address'];
                $salary = $_POST['salary'];

                mysqli_stmt_execute($stmt);
                echo "Records added successfully.";

            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            } 

            mysqli_stmt_close($stmt);

            mysqli_close($link);

            header("location: employee_home.php");
        }
      
       
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
        <h1>Create Record</h1>
        <p>Please fill this form and submit to add employee record to the database.</p>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
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