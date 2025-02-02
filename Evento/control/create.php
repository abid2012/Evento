<?php

if(isset($_POST["create"])){
    $en = $_POST["en"];
    $ed = $_POST["ed"];
    $mc = $_POST["mc"];
    

    if($en == "" || $ed == "" || $mc == "" || empty($_POST["edate"])){
        echo "<h3 style='color: red; margin-top: 25px'>Event name, date, capacity & description required</h3>";
    }

    else{

        try{
           
            include "./model/db.php";
    
            $sql = "INSERT INTO events(Event_Name,Event_Desc,Maximum_Capacity,Event_Date) VALUES ('$en','$ed','$mc','$_POST[edate]')";
    
            if ($conn->query($sql) === TRUE) {
                echo "<h3 style='color: green; margin-top: 25px'>Event created</h3>";

            } else {
                echo "<h3 style='red: white; margin-top: 25px'>Event not created. Please check your internet.</h3>";
               
            }
        }

        catch(Exception $e){
            echo "<h3 style='color: red; margin-top: 25px'> Something is wrong. Please try again. </h3>";
        }

        $conn->close();

    }
}


?>