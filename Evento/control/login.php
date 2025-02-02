<?php 


    session_start();



    if(isset($_POST["login"])){
        
        
        include "./model/db.php";
      
        $username = $_POST['em'];  
        $password = $_POST['pass']; 
        
        if(empty($username)){
            echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Email required</h2>";
        }

        else if(empty($password)){
            echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Password required</h2>";
        }

        else{

           
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "SELECT * FROM users WHERE User_Email='$username' LIMIT 1";  
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result); 
       
        if($num == 1){

            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['User_Password'])){
                    
                    $_SESSION["e"]=$_POST["em"];
                    $_SESSION["p"]=$_POST["pass"];
                    header("location: ../dashboard");

                }
                else{
                    echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Invalid Password</h2>";
                }
            }
           
        }
        else{
            echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Something Went Wrong. Email may not exist.</h2>";
        }
    }

    $conn->close();
 }
?>  