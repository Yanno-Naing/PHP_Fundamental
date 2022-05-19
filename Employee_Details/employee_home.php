<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> 
        <div class="heading" >
            <h1>Employee Details</h1>
            <a href="create_employee.php" class="btn btn-success" role="button">Add New Employee</a>
        </div>

        <input type="text" id="search" onkeydown="searchData()">

        <?php
            $sql = 'SELECT * FROM employee_details';
            $no = 1;
            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){
                    //echo mysqli_num_rows($result);
                    
                    echo "<table class='table table-striped'>
                    <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th colspan='3' style='text-align:center'>Actions</th>
                    </tr>";

                    while($row = mysqli_fetch_assoc($result)){
                        //print_r($row); die();
                        echo "<tr id='".$row['id']."'>";
                        echo "<th>".$no."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['salary']."</td>";
                        echo "<td class='muted'><a href='show_employee.php?id=".$row['id']."' data-bs-toggle='tooltip' title='View record'><i class='fa-solid fa-eye'></i></a></td>
                        <td class='muted'><a href='edit_employee.php?id=".$row['id']."' data-bs-toggle='tooltip' title='Edit record'><i class='fa-solid fa-pencil'></i></a></td>
                        <td class='muted'><a href='delete_employee.php?id=".$row['id']."' data-bs-toggle='tooltip' title='Delete record'><i class='fa-solid fa-trash-can'></i></a></td>";
                        echo "</tr>";
                        $no++;
                    }

                    echo "</table>";

                    mysqli_free_result($result);
                }else{
                    echo "<h4>No records were found.</h4>";
                }
            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            }
            mysqli_close($link);

        ?>
    
    </div>

    <script>
        $(document).ready(function() {
            
            
        });
        function searchData(){
            var searchinput = $('#search').val();
            if(searchData != ""){
                $.ajax({
                url: "search.php",
                type: "post",
                data: {searchData: searchinput} ,
                success: function (response) {
                    // if(response){
                    //     var obj = JSON.parse(response);
                    //     showResult(obj);
                    // }
                    console.log(response);
                    
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });
            }
            
        }
        function showResult(obj){
            var table = document.getElementsByTagName('table');
            console.log(table.rows);
        }


    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>