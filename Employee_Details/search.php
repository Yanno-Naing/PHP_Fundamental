<?php
require 'auth.php';
require 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_POST['searchData']){
        
        $searchData = $_POST['searchData'];

        // echo json_encode(['searchdata'=>$searchData]); die();
        $sql = "SELECT id FROM employee_details
        WHERE LOWER(name) LIKE LOWER('$searchData%')";

        $result = mysqli_query($link, $sql);
                
        //mysqli_num_rows($result);

         $data = mysqli_fetch_all($result);
                    //var_dump($row); die();
        echo json_encode($data,1);

        mysqli_free_result($result);
                
          
        mysqli_close($link);


    }
    // echo json_encode([],1);
}
