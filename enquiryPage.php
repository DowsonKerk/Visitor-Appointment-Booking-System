<?php
 session_start();
 require 'dbcon.php';
 include('PostEnquiry.php');
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

<body>

<nav class="navbar navbar-expand-sm">
    <div class="container-fluid fixed-top shadow-sm">
        <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Link</a>
                </li>
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="enquiryPage.php">Enquiry</a>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Welcome back, Ali.
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a href="profile.php">
                                <button class="dropdown-item" type="button" >profile</button>
                            </a></li>
                            <li><button class="dropdown-item" type="button">Logout</button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br></br><br></br>


<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Enquiry Form</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>


<div class="container mt-5">
    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5 mx-auto">
            <form id="contact-form" name="contact-form" action="" method="POST">

                <!--Grid row-->
                <div class="row">

                    <?php echo display_error2(); ?>
               

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="fullName" id="fullName" placeholder="full name">
                            <label for="fullName">Full Name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">

                            <input type="text" id="enquiryEmail" name="enquiryEmail" class="form-control" placeholder="kel@gamil.com">
                            <label for="enquiryEmail" class="">Your Email</label>
    
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="int" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="016883123">
                            <label for="phoneNumber" class="">Phone Number</label>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="promotion">
                            <label for="subject" class="">Subject</label>
                            
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="form-floating">
                            <textarea type="text" id="Comments" name="Comments" rows="2" class="form-control md-textarea" placeholder="Leave a comment here"></textarea>
                            <label for="Comments">Your Comments</label>
                            
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->

                 <div class="text-center text-md-left">
                    <button type="post" id="post_enquiry" name="post_enquiry" class="btn btn-primary" >Send</button>
                </div>
            
            </form>

           
            <div class="status"></div>
        </div>
        <!--Grid column-->

       
        
      

    </div>
</div>
</section>
<!--Section: Contact v.2-->


<div class='container-fluid border" style="width 100%;'>
  <footer class="py-1 my-2">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>