<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Image</title>
    <style type="text/css">
        .img-box{
        display: inline-block;
        text-align: center;
        margin: 0 15px;
        }
    </style>
</head>
<body>
    <?php 
        $images = array("kites.png","balloons.jfif"); 

        foreach ($images as $image) {
        //print_r(pathinfo($image,PATHINFO_FILENAME));
        echo "<div class ='img-box'>";
        echo '<img src ="images/'.$image.'" width = "200" alt ="'.pathinfo($image,PATHINFO_FILENAME).'">';
        echo '<p><a href = "download.php?file=' .urlencode($image).'">Download</a></p>';

        echo "</div>";
        }

    ?>


</body>
</html>