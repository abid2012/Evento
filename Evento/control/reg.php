<?php

include "./model/db.php";

if(isset($_POST["register"])){
    $fn = $_POST["fn"];
    $email = $_POST["email"];
    $passw = $_POST["passw"];

    if(empty($fn)){
        echo "<h2 style='background-color: rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Full Name is required</h2>";
    }

    else if(empty($email)){
        echo "<h2 style='background-color: rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Email is required</h2>";
    }

    else if(empty($passw)){
        echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Password is required</h2>";
    }

    else{

        $hashpassw = password_hash($passw,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (User_Name, User_Email, User_Password)
        VALUES ('$fn', '$email', '$hashpassw')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2 style='background-color:rgb(143, 255, 118); color: black; text-align: center; padding:7px'>Registration Successful</h2>";
        } else {
            echo "<h2 style='background-color:rgb(255, 118, 129); color: black; text-align: center; padding:7px'>Something went wrong. Please try again</h2>";
        }

        $conn->close();
        
    }
}

?>