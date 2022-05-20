<?php
session_start();
require('config.php');
//var_dump($link);

    $nameErr = $passErr = $conpassErr = "";
    $name = $pass = $conpass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["user_name"])) {
          $nameErr = "Please enter a name";
        } else{
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["user_name"])) {
            $nameErr = "Only letters and white space allowed";
          }else{
            $name = $_POST['user_name'];
          }
        }
      
        if (empty($_POST["password"])) {
          $passErr = "Please enter a password";
        } elseif(strlen($_POST['password']) < 6){
            $passErr = "Password must have at least 6 characters";
        }else{
            $pass = $_POST["password"];
        }

        if(empty($_POST['confirm_pass'])){
            $conpassErr = "Please confirm password";
        }elseif(empty($pass)){
            $conpassErr = "Please fill Password first to confirm";
        }elseif(strlen($_POST['confirm_pass']) < 6){
            $conpassErr = "Confirm Password must have at least 6 characters";
        }else{
            if($_POST['password'] !== $_POST['confirm_pass']){
                $conpassErr = "Password did not match";
            }else{
                $conpass = $_POST['confirm_pass'];
            }
        }

        if((!empty($name)) && (!empty($pass)) && (!empty($conpass))){
            //  echo date(); die();

            $sqlselect = "SELECT name FROM admin";

            $result = mysqli_query($link, $sqlselect);

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){
                    if($name === $row['name']) $nameErr = "Username already exist.";
                }

                mysqli_free_result($result);
            }

            if(empty($nameErr)){
                $sql = 'INSERT INTO admin( name, password, created_date) VALUES ( ?,?,? )';

                if($stmt = mysqli_prepare($link, $sql)){
                    //echo "trure";

                    mysqli_stmt_bind_param($stmt, 'sss', $name, $hash_pass, $date);

                    $name = $_POST['user_name'];
                    $hash_pass = password_hash($pass, PASSWORD_BCRYPT);
                    $date = date("Y-m-d h:i:sa");

                    mysqli_stmt_execute($stmt);
                    //echo "Records added successfully.";
                    $_SESSION['MESSAGE'] = "Account successfully created. Login to enter BrycenMyanmar Dashboard.";
                
                }else{
                    echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
                } 

                mysqli_stmt_close($stmt);

                mysqli_close($link);

                header("location: login.php");
            }
            
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
        <h1>Sign Up</h1>
        <p>Please fill this form to create an account.</p>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Username: </label>
                <input type="text" class="form-control" name="user_name" id="name" placeholder="Username"
                value="<?php echo ($name)?: ""; ?>">
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($nameErr)?: ""; ?></div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password: </label>
                <input type="password" class="form-control" name="password" id="pass" 
                placeholder="Password" value="<?php echo ($pass)?: ""; ?>">
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($passErr)?: ""; ?></div>
            </div>
            <div class="mb-3">
                <label for="confirm_pass" class="form-label">Confirm Password: </label>
                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" 
                placeholder="Confirm Password" value="<?php echo ($conpass)?: ""; ?>">
                <!-- <span></span> -->
                <div id="name" class="form-text text-red"><?php echo ($conpassErr)?: ""; ?></div>
            </div>
            <input type="submit" class="btn btn-success" value="Submit" >
            <input type="reset" class="btn btn-primary" value="Reset" >
        </form>
        <p>Already have an account? <a href="login.php">Login here.</a></p>
    </div>

</body>
</html>