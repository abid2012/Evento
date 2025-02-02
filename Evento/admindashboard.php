<?php


session_start();
if(!isset($_SESSION["user"])){
    header("location: ./adminlogin");
}


include "./model/db.php";
$query = "SELECT * FROM events ORDER BY Event_Id ASC";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM attendees, events WHERE attendees.Event_Id=events.Event_Id ORDER BY Attendee_Id ASC";
$result2 = mysqli_query($conn, $query2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/red-carpet.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <title>Evento</title>
</head>
<body>

<div class="bg-dark pt-3">
        <a href="./control/adminlogout.php" style="text-decoration: none;"><button class="btn btn-danger d-block ms-auto me-3">Logout</button></a>
    </div>


     <form class="bg-dark text-white p-4" method="post" action="./control/csv.php">
     <div class="mb-3">
                <label for="en" class="form-label">Download Attendee List For Specific Event</label>
                <select class="form-select" name="event" id="event">
                        <?php
                        if ($result->num_rows > 0) {
                            // Loop through each row in the result set
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['Event_Id']}'>{$row['Event_Name']}</option>";
                            }
                        } else {
                            echo "<option value=''>No events found</option>";
                        }
                        ?>
                    </select>
            </div>  
            <button type="submit" class="btn btn-success" name="download">Download CSV</button>
    </form>

  

   


    <table class="table table-striped">

            <tr>
                <th>Attendee Id</th>
                <th>Attendee Name</th>
                <th>Attendee Phone</th>
                <th>Attendee Email</th>
                <th>Attendee Gender</th>
                <th>Event Id</th>
                <th>Event Name</th>
            </tr>

            <?php
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<tr>".
                                            "<td>".
                                            $row2["Attendee_Id"].
                                            "</td>".
                                            "<td>".
                                            $row2["Attendee_Name"].
                                            "</td>".
                                            "<td>".
                                            $row2["Attendee_Phone"].
                                            "</td>".
                                            "<td>".
                                            $row2["Attendee_Email"].
                                            "</td>".
                                            "<td>".
                                            $row2["Attendee_Gender"].
                                            "</td>".
                                            "<td>".
                                            $row2["Event_Id"].
                                            "</td>".
                                            "<td>".
                                            $row2["Event_Name"].
                                            "</td>".
                                    "</tr>";
                                
                            }
                        } else {
                            echo "<tr>"."<td>"."No events found"."</td>"."</tr>";
                        }
            ?>


        

    </table>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>