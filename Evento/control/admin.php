<?php      

    session_start();

    if(isset($_POST["logina"])){
        include "./model/db.php";  
    $username = $_POST['ema'];  
    $password = $_POST['passa'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from admin where Username = '$username' and Password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION["user"]=$_POST["ema"];
            $_SESSION["pass"]=$_POST["passa"];
            header("location: ../dashboard");
        }  
        else{  
            echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px; margin-top: 10px;'>Invalid Username or Password</h2>";
        }    
        
        $conn->close();
    }
?>  