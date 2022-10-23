<?php
 session_start();
 require 'dbcon.php';
 include('Account.php');
 if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: login.php');
 }
?>


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
        <a class="navbar-brand" href="home.php">
            <img src="images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item p-1">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Product</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Booking</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Notification</a>
                </li>

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
                             Welcome Back, <?php echo $_SESSION['user']['username']; ?>!
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item" type="button" onclick="location.href='profile.php?id=<?= $_SESSION['user']['id']; ?>'">Profile</button></li>
                            <li><button class="dropdown-item" type="button"><a href="home.php?logout='1'" class="text-decoration-none text-black">Logout</a></button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<br></br><br></br>



<div class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit profile Details
                    <a href="profile.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">



                <?php
                    if(isset($_GET['id'])){

                    $id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM users WHERE id='$id'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $userInfo = mysqli_fetch_array($query_run);
                        ?>
                        
                        <form class="" action="profileUpdate.php" method="POST">

                            <?php echo display_error(); ?>
                            <br>

                            <input type="hidden" name="id" value="<?php echo $userInfo['id']; ?>" class="form-control">
                            
                            <div class="form-group pb-3">
                              <label for="name">Your name</label>
                              <input type="text" name="name" value="<?php echo $userInfo['full_name']; ?>" class="form-control">
                            </div>
                            <div class="form-group pb-3">
                              <label for="username">Your username</label>
                              <input type="text" name="username" value="<?php echo $userInfo['username']; ?>" class="form-control">
                            </div>
                            <div class="form-group pb-3">
                              <label for="username">Birthday</label>
                              <input type="date" name="birthday" value="<?php echo $userInfo['birthday']; ?>" class="form-control">
                            </div>
                            <div class="form-group pb-3">
                              <label for="email">Email address</label>
                              <input type="email" id="email" name="email" value="<?php echo $userInfo['email']; ?>" class="form-control">
                            </div>
                            <div class="form-group pb-3">
                              <label for="mobile">Mobile Number</label>
                              <input type="text" id="contactnum" name="contactnum" value="<?php echo $userInfo['contact_number']; ?>" class="form-control">
                            </div>

                            <div class="form-group pt-3">
                              <button type="submit" id="update_user" name="update_user" class="btn btn-primary" >Update</button>
                            </div>

                        </form>

                        <?php

                         }
                    }
                   
                ?>
            </div>
        </div>
    </div>
</div>
</div>

  

<br></br><br></br>



<div class="container-fluid border" style="width: 100%;">
  <footer class="py-1 my-2">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="home.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Booking</a></li>
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