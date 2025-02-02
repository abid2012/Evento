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

    <title>Evento</title>
</head>
<body>

    <div class="row">

        <div class="col-lg-3 home-color">
            <br> <br>
            <img src="./images/layout.png" alt="Layout" height="100px" width="100px" class="m-auto d-block">
            <h2 class="text-center text-white mt-3">Attendee Form</h2>

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

                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <strong>Attendee can not register if the event already reached its registration limit</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form class="insert-form mt-3" method="post">
                    <div class="mb-3">
                        <label for="an" class="form-label">Attendee Name</label>
                        <input type="text" class="form-control" name="an" id="an">
                    </div>

                    <div class="mb-3">
                        <label for="ap" class="form-label">Attendee Phone</label>
                        <input type="number" class="form-control" name="ap" id="ap">
                    </div>

                    <div class="mb-3">
                        <label for="ae" class="form-label">Attendee Email</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" name="ae" id="ae">
                    </div>

                    <label class="form-check-label">Attendee Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" checked value="Male">
                        <label class="form-check-label" for="gender">
                            Male
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>

                    <label for="event">Select Event:</label>
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
  
        
                    <button type="submit" class="db-button create fw-bold" name="apply">Apply</button>

                </form>


                <?php
                    include "./control/attencontrol.php";
                ?>

        </div>

        

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

