<?php      
    $host = "192.168.1.212";  
    $user = "root";  
    $password = 'root';  
    $db_name = "test";  
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  } 
        

        /// sql 


        // thos is from log page input
        $username = $_POST['name'];  
        $password = $_POST['pass'];  
          
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
          
            // GET FROM SQL WHER "Log" = and Pass = //
            $sql = "select * from pbx where login_name  = '$username' and pass = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<h1><center> Login successful </center></h1>";  
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }     