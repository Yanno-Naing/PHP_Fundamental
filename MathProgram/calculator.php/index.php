<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        input[type=submit]{
            width: 50px;
            height: 25px;
            margin-right: 5px;
        }

        body{
            text-align: center;
            padding-top: 10em;
        }
        form{
            width: 30%;
            margin: 0 auto;
            border:1px solid;
            padding: 1em 0;
        }
    </style>
</head>
<body>
    <h1> Small Calculator</h1>
    <form action="cal_func.php" method="post">
        Number 1:
        <input type="number" name="num1"><br><br>
        Number 2:
        <input type="number" name="num2"> <br><br>
        <input type="submit" name="submit" value="+">
        <input type="submit" name="submit" value="-">
        <input type="submit" name="submit" value="*">
        <input type="submit" name="submit" value="/">
    </form>
</body>
</html>