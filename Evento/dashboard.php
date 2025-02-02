<?php

session_start();
if(!isset($_SESSION["e"])){
    header("location: ./home");
}



include "./model/db.php";
$query = "SELECT * FROM events ORDER BY Event_Id ASC";
$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/red-carpet.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/dashboard.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="./jquery.tabledit.min.js"></script>

    <title>Evento</title>
</head>
<body>


    <div class="row">

        <div class="col-lg-3 home-color">
            <br> <br>
            <img src="./images/layout.png" alt="Layout" height="100px" width="100px" class="m-auto d-block">
            <h2 class="text-center text-white mt-3">Welcome To dashboard</h2>

            <a href="./dashboard">
                <div class="db-button">
                    <img src="./images/dashboard.png" alt="Insert" height="25px" width="25px">
                    <span class="insert-span">Dashboard</span>
                </div>
            </a>

            <a href="./attendee">
                <div class="db-button">
                    <img src="./images/profile.png" alt="Insert" height="25px" width="25px">
                    <span class="insert-span">Attendee</span>
                </div>
            </a>
    
           <form action="./control/logout.php" method="post">
           <div class="db-button">
                <img src="./images/logout.png" alt="Logout" height="25px" width="25px">
                
                    <span class="insert-span"><input type="submit" value="Logout" class="logout"></span>
       
            </div>
           </form>

        </div>


        <div class="col-lg-9">

                <form class="insert-form mt-3" method="post">
                    <div class="mb-3">
                        <label for="en" class="form-label">Event Name</label>
                        <input type="text" class="form-control" name="en" id="en">
                    </div>
                    <div class="mb-3">
                        <label for="edate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" name="edate" id="edate" min="2025-01-01" max="2025-12-31">
                    </div>
                    <div class="mb-3">
                        <label for="mc" class="form-label">Maximum Capacity</label>
                        <input type="number" class="form-control" name="mc" id="mc">
                    </div>
                    <div class="mb-1">
                        <label for="ed" class="form-label">Event Description</label>
                        <textarea class="form-control" id="ed" name="ed" rows="3"></textarea>
                    </div>
        
                    <button type="submit" class="db-button create fw-bold" name="create">Create Event</button>

                </form>


                <?php
                    include "./control/create.php";
                ?>



                <!-- Search starts -->
                <form class="d-flex mt-5" method="post" action="">
                        <input class="form-control me-2" type="search" placeholder="Search Event Name" aria-label="Search" name="s">
                        <button class="btn btn-success" type="submit" name="search">Search</button>
                </form>

                <?php
                    include "./control/searchevent.php";
                ?>
                <!-- Search Ends -->


                            <div class="table-responsive mt-4">
                <h3 class="text-center">Events</h3><br />
                <table id="editable_table" class="table table-bordered table-light">
                    <thead>
                        <tr>
                            <th>Event Id</th>
                            <th>Event Name</th>
                            <th>Event Date</th>
                            <th>Event Description</th>
                            <th>Maximum Capacity</th>
                        </tr>
                    </thead>
                    <tbody id="eventTableBody">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <tr>
                                <td>' . $row["Event_Id"] . '</td>
                                <td>' . $row["Event_Name"] . '</td>
                                <td>' . $row["Event_Date"] . '</td>
                                <td>' . $row["Event_Desc"] . '</td>
                                <td>' . $row["Maximum_Capacity"] . '</td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
 


        </div>

        

    </div>


    
    <script>


function fetchEvents() {
        $.ajax({
            url: './control/fetch_events.php', 
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                
                $('#eventTableBody').empty();

                data.forEach(function (event) {
                    $('#eventTableBody').append(`
                        <tr>
                            <td>${event.Event_Id}</td>
                            <td>${event.Event_Name}</td>
                            <td>${event.Event_Date}</td>
                            <td>${event.Event_Desc}</td>
                            <td>${event.Maximum_Capacity}</td>
                        </tr>
                    `);
                });

                initializeTabledit();
            },
            error: function (xhr, status, error) {
                console.error("Error fetching events: ", error);
            }
        });
    }

    function initializeTabledit() {
        $('#editable_table').Tabledit({
            url: './action.php',
            columns: {
                identifier: [0, "Event_Id"],
                editable: [
                    [1, 'Event_Name'],
                    [2, 'Event_Date'],
                    [3, 'Event_Desc'],
                    [4, 'Maximum_Capacity']
                ]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.Id).remove();
                }

                fetchEvents();
            }
        });
    }

    $(document).ready(function () {
        fetchEvents();
    });





    </script>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

