<?php

include "../model/db.php";

$sql = "SELECT Event_Id, Event_Name, Event_Date, Event_Desc, Maximum_Capacity FROM events";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Return events as JSON
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>