<?php

class sqlConnection {    
    // if(mysqli_error($conn)){
    //     echo $conn->error;
    // }
    public static function connector() : mysqli{
        $url = "localhost";
        $username = "root";
        $pass = "";
        $database = "php_native";
        $conn = mysqli_connect($url, $username, $pass, $database);    
        if($conn){
            return $conn;
        }else{
            return 'error';
        }
    }
}