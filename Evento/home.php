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
    
<div class="back">

<div class="text-center pt-3">
  <a href="./home"><button class="btn btn-light user">User</button></a>
  <a href="./adminlogin"><button class="btn btn-dark admin">Admin</button></a>
</div>


    <div class="row container log-div">

    <h1 class="text-white text-center mb-2">Welcome To Evento - The Event Management</h1>


       <!-- Login Form starts -->

        <div class="col-md-6 bg-dark text-white">
            <form class="log-form" method="post" onsubmit="return loginvalid()">
              <h2 class="text-decoration-underline mb-4">Login</h2>
                <div class="mb-3">
                  <label for="em" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="em" name="em">
                </div>
                <div class="mb-3">
                  <label for="pass" class="form-label">Password</label>
                  <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <button type="submit" class="btn btn-primary" id="login" name="login">Login</button>
                <div class="mt-3">
                  <label for="" class="form-label">Don't have an account? <a href="./register" class="text-info">Register Now</a></label>
                </div>
                
              </form>
        </div>

        
      <!-- Login Form ends -->


        <div class="col-md-6 log-img">
          
        </div>

    </div>

   


    <?php

        include "./control/login.php";

        if(isset($_SESSION["e"])){
            header("location: ./dashboard");
        }


    ?>



</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>