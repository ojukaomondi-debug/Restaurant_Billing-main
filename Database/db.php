<?php

// Database configuration
        $db_server = 'localhost';
        $db_user = 'root';
        $db_pass = '22092209';
        $db_name = 'restaurant_billing';
        $conn = '';


        try{
            $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); 
        }catch(mysqli_sql_exception){
            echo'Couldnot connect to the database!';
        }
        
?>