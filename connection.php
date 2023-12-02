<?php
    $connect = mysqli_connect("localhost", "root", "", "notemaker_db");
    $status = "";
    
    function checkcon(){

        if(mysqli_connect_errno())
        {
            return $status = "Failed to connect to Mysqli; " . mysqli_connect_error();
        }
        else {
            return $status = "Succesfully connected to the database";
        }
    }
?>