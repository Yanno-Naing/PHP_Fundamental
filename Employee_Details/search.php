<?php
require 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_POST['searchData']){
        $searchData = $_POST['searchData'];

        $sql = "SELECT id FROM employee_details
        WHERE name LIKE '%$searchData%'";

            if($result = mysqli_query($link, $sql)){
                
                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                        $data[] = $row;
                        
                    }

                    echo json_encode($data);

                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }else{
                echo 'ERROR: Could not be able to execute $sql '.mysqli_error($link);
            }
            mysqli_close($link);


    }
}