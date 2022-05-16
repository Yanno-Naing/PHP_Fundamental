<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact Form </title>
</head>
<body>
    
    <h2>Contact Form</h2>
    <p>Please Fill this form</p>
    <form action="process-form.php" method="POST">
        <p>
            <label for="inputName"> Name:<sup>*</sup></label>
            <input type="text" id="inputName" name="name">
        </p>
        <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail">
        </p>
        <p>
            <label for="inputSubject">Subject:</label>
            <input type="text" name="subject" id="inputSubject">
        </p>
        <p>
            <label for="inputComment">Message:</label>
            <textarea name="message" id="inputComment" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>



</body>
</html>