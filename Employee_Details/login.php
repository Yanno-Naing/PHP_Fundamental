<?php
session_start();
require('config.php');
//var_dump($link);

    $nameErr = $passErr = "";
    $name = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["user_name"])) {
          $nameErr = "Please enter a name";
        } else{
          $name = $_POST['user_name'];
        }
      
        if (empty($_POST["password"])) {
          $passErr = "Please enter a password";
        }else{
            $pass = $_POST["password"];
        }

        if((!empty($name)) && (!empty($pass))){
            
            $err = true;

            function validatePass($name){
                global $link;
                global $pass;
                global $passErr;

                $sql = "SELECT id,password FROM admin WHERE name ='$name'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_assoc($result);
                   
                //$hash_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

                if (password_verify($pass, $data['password']))
                {
                    /* The password is correct. */
                    $login = TRUE;
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['username'] = $name;
                    $_SESSION['auth'] = $login;

                    header("location: employee_home.php");
                }else{
                    $passErr = "Password Incorrect!";
                }

            }

            $sqlselect = "SELECT name FROM admin";

            if($result = mysqli_query($link, $sqlselect)){
                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){
                        if($name == $rows['name']){
                            $err = false;
                            validatePass($rows['name']);
                            break;
                        }
                    }

                }
            }

            ($err)? $nameErr = "Username was invalid": "";

            mysqli_close($link);
            
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
        <h1>Login</h1>
        <p>Please fill in your credentials to login.</p>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Username: </label>
                <input type="text" class="form-control" name="user_name" id="name" placeholder="Name"
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
            <input type="submit" class="btn btn-primary" value="Submit" >
        </form>
        <p>Don't have account? <a href="register.php">Sign up now.</a></p>
    </div>

</body>
</html>