<?php
    session_start();
    require 'dbcon.php';
    include('Account.php');
?>
<!-- Not login -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="icon" href="images\icon.png" type="image/icon type">
        <link rel="stylesheet" href="styles\homepage.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
<body>
    
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid fixed-top shadow-sm bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item p-1">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Product</a>
                </li>

                <!-- <li class="nav-item p-1">
                    <a class="nav-link" href="#">Booking</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Notification</a>
                </li>  -->

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Enquiry Page</a>
                </li>
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Customer Service</a>
                </li>

                <!-- <li class="nav-item p-1">
                    <a class="nav-link" href="#">Report</a>
                </li> -->
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="productcatalogue.php">Product Catalogue</a>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Welcome!
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item" type="button" onclick="location.href='login.php'">Login</button></li>
                            <li><button class="dropdown-item" type="button" onclick="location.href='register.php'">Sign Up</a></button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br><br><br>
<div class="row col-12">  
    <div class="row col-10 mx-auto">
    <div class="row mx-auto my-auto">
        <div class="col">
            <h2 class="text-center">Product Catalogue</h2>
        </div>
    </div>


    <form  action="search.php" method="POST">
        <div class="d-flex justify-content-center mx-auto">
            <div class="form-outline" style="width: 50%;">
                <input type="search" class="form-control" placeholder="Search">
            </div>
            <button type="button" class="btn btn-primary">Search</button>
        </div>
    </form>
    <br><br><br>

    <?php 
        $query = "SELECT * FROM tblproductcatalogue";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $productcatalogue)
            {
        ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="admin\uploadedimage\<?php echo $productcatalogue['stockPicture']?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    
                    <div class="col-md-8 my-auto">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $productcatalogue['stockName']?></h5>
                            <p class="card-text d-flex align-items-center justify-content-center pt-5"><small class="text-muted">Click for more details</small></p>
                        </div>
                    </div>

                    <div class="col-md-2 my-auto">
                        <div class="card-body">
                            <p class="card-text text-center h2"><?php echo $productcatalogue['stockPrice']?>$</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
            }
            ?>
    </div>
</div>

<div class="container-fluid border" style="width: 100%;">
  <footer class="py-1 my-2 ">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product</a></li>
      <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Booking</a></li> -->
      <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Notification</a></li> -->
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Enquiry Page</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Customer Service</a></li>
      <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Report</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product Catalogue</a></li> -->
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>