<?php
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
          $comment = $_POST["address"];
        }

        if(empty($_POST['salary'])){
            $salaryErr = "Please enter the salary amount";
        }else{
            if($_POST['salary'] < 0){
                $salaryErr = "Please enter a positive integer value";
            }else{
                $salary = $_POST['salary'];
            }
        }

        if((!empty($name)) && (!empty($address)) && (!empty($salary))){
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <h1>Create Record</h1>
    <p>Please fill this form and submit to add employee record to the database.</p>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <p>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" placeholder="Name">
            <span><?php ($nameErr)? $nameErr:""; ?></span>
        </p>
        <p>
            <label for="address">Address: </label>
            <textarea name="address" id="address" cols="30" rows="10"></textarea>
            <span><?php ($addressErr)? $addressErr:""; ?></span>
        </p>
        <p>
            <label for="salary">Salary: </label>
            <input type="number" name="salary" id="salary" placeholder="Salary">
            <span><?php ($salaryErr)? $salaryErr:""; ?></span>
        </p>
        <input type="submit" value="Submit">
    </form>

</body>
</html>