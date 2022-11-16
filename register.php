<?php
    session_start();
    require 'dbcon.php';
    include('Account.php');

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
<!--
                <li class="nav-item p-1">
                    <a class="nav-link" href="enquiryPage.php">Enquiry Page</a>
                </li>

                 <li class="nav-item p-1">
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
                            <li><button class="dropdown-item active" type="button" onclick="location.href='register.php'">Sign Up</a></button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<br>
<br>
<br>
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                    <form method="post" action="register.php" enctype="multipart/form-data">
                        <?php echo display_error(); ?>
                    <div class="form-outline mb-4">
                        <input type="text" id="username" name="username" class="form-control form-control-lg"/>
                        <label class="form-label" for="username">Your Username</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control form-control-lg"/>
                        <label class="form-label" for="name">Your Full Name</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="date" id="birthday" name="birthday" class="form-control form-control-lg"/>
                        <label class="form-label" for="birthday">Birthday</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="contact_num" name="contact_num" class="form-control form-control-lg"/>
                        <label class="form-label" for="contact_num">Contact Number</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"/>
                        <label class="form-label" for="email">Your Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password_1" name="password_1" class="form-control form-control-lg" />
                        <label class="form-label" for="password_1">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password_2"  name="password_2"class="form-control form-control-lg" />
                        <label class="form-label" for="password_2">Repeat your password</label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
                    </div>


                    <p class="text-center text-muted mt-1 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u class="text-primary">Login here</u></a></p>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>


<div class="container-fluid border" style="width: 100%;">
  <footer class="py-1 my-2 ">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
