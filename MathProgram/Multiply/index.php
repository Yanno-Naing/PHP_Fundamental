<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        input[type=submit]{
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
    <p>Enter number to multiply.</p>
    <form action="multiply.php" method="post">
        Number :
        <input type="number" name="num1"><br><br>
        <input type="submit" name="submit" value="MULTIPLICATION">
    </form>
</body>
</html>