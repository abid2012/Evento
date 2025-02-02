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



    <div class="row reg-div">

    <h1 class="text-white text-center mb-4 mt-4">Evento Registration</h1>

       <!-- Registration Form starts -->

        <div class="col-md-12 bg-dark text-white p-4">
            <form class="" method="post" onsubmit="return registervalid()">
              <h2 class="text-decoration-underline mb-4">Register</h2>
              <div class="mb-3">
                  <label for="n" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="fn" name="fn">
                </div>
                <div class="mb-3">
                  <label for="em" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                  <label for="pass" class="form-label">Password</label>
                  <input type="password" class="form-control" id="passw" name="passw">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <div class="mt-3">
                  <label for="" class="form-label">Already have an account? <a href="./index" class="text-info">Login</a></label>
                </div>
                
              </form>
        </div>

        
      <!-- Registration Form ends -->

    </div>


   


    <?php

        include "./control/reg.php";

    ?>

</div>



    <script src="./js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>