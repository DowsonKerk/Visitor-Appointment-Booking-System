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
                </li>
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Product Catalogue</a>
                </li> -->

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


<div class="imgcontainer shadow">
    <img src="images\front_img.png" class="img-fluid" alt="Responsive image" style="width:100%; height: auto;">
    <div class="img-center">
        <h2>Cacti-Succulent Kuching</h2>
        <h1>Book With Our Newest Application</h1>
        <h5>Sign Up to get more Information</h5>
        <br>
        <button type="button" class="btn btn-outline-light" onclick="location.href='login.php'">Login</button>
        <button type="button" class="btn btn-outline-light" onclick="location.href='register.php'">Sign Up</button>
    </div>
</div>


<div class="container mt-5">
    <div class="row col-12" style="padding:0; margin:0;">
        <div class="col-6 my-auto p-3">
            <hr>
            <h1 class="text-center">About Us</h1>
            <hr>
        </div>

        <div class="col-6 my-auto p-3">
            <hr>
            <p class="text-center">
                Our Company is a local homegrown business specialized in selling various type and size of succulent plants. 
                <br><br>Our Company also sell different type of gardening tools, soils and fertilizers at an affordable cost. 
                <br><br>Our primary mission is to establish a long-lasting relationship of trust and commitment with each visitor through providing the highest level of customer service
            </p> 
            <hr>
        </div>
    </div>
</div>

<br>
<br>

<div class="shadow-sm">
    <img src="images\three_cactus.jpg" class="img-fluid shadow-lg" alt="Responsive image" style="width:100%; height: auto;">
</div>

<br>
<br>

<div class="row col-12">  
    <div class="row col-10 mx-auto">
    <hr>
    <div class="row mx-auto my-auto">
        <div class="col">
            <h1 class="text-center">Sales Ongoing</h1> 
        </div>
    </div>
    <hr>
    <?php 
    $query = "SELECT * FROM banner";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $banners)
        {
    ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="admin\uploadedimage\<?php echo $banners['images']?>" class="img-fluid rounded-start" alt="...">
                </div>
                
                <div class="col-md-6 my-auto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $banners['product_name']?></h5>
                        <p class="card-text"><?php echo $banners['product_description']?></p>
                        <p class="card-text d-flex align-items-center justify-content-center pt-5"><small class="text-muted">Sales Period: <?php echo $banners['product_date_start']?> to  <?php echo $banners['product_date_end']?></small></p>
                    </div>
                </div>

                <div class="col-md-2 my-auto">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $banners['product_offer']?>% Off</h5>
                        <p class="card-text text-center h2">For <?php echo $banners['product_price']?>$</p>
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
  <footer class="py-1 my-2">
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
	