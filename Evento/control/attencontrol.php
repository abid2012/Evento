<?php

include "./model/db.php";

if(isset($_POST["apply"])){
    $an = $_POST["an"];
    $ap = $_POST["ap"];
    $ae = $_POST["ae"];
    $event = $_POST["event"];

    if(empty($an) || empty($ap) || empty($ae) || empty($event)){
        echo "<h2 style='background-color: rgb(178, 0, 15); color: white; text-align: center; padding:10px; margin-top: 30px;'>All fields are required</h2>";
    }

    else{

        $result = $conn->query("SELECT COUNT(*) as count FROM attendees WHERE Event_Id = $event");
        $row = $result->fetch_assoc();
        $current_attendees = $row['count'];

        $result = $conn->query("SELECT Maximum_Capacity FROM events WHERE Event_Id = $event");
        $row = $result->fetch_assoc();
        $max_attendees = $row['Maximum_Capacity'];

        if ($current_attendees < $max_attendees) {

            $stmt = "INSERT INTO attendees(Attendee_Name, Attendee_Phone, Attendee_Email, Attendee_Gender, Event_Id) VALUES ('$an', '$ap', '$ae', '$_POST[gender]', '$event')";

            if ($conn->query($stmt) === TRUE) {
                echo "<h2 style='background-color: rgb(0, 178, 30); color: white; text-align: center; padding:10px; margin-top: 30px;'>Attendee Registration Successful</h2>";
            } else {
                echo "<h2 style='background-color: rgb(178, 0, 15); color: white; text-align: center; padding:10px; margin-top: 30px;'>Something went wrong. Please try again</h2>";
            }

        } else {
            echo "<h2 style='background-color: rgb(178, 0, 15); color: white; text-align: center; padding:10px; margin-top: 30px;'>Sorry, this event has reached its maximum number of attendees</h2>";
        }

        $conn->close();
        
    }
}

?>