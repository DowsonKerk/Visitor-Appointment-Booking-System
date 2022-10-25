<?php
session_start();
include('../dbcon.php');
include('../Account.php');
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="icon" href="../images\icon.png" type="image/icon type">
        <link rel="stylesheet" href="..\styles\homepage.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
<body>
   
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid fixed-top shadow-sm bg-light">
        <a class="navbar-brand" href="#">
            <img src="../images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item p-1">
                    <a class="nav-link active" href="admin.php">Home</a>
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

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Report</a>
                </li>
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Product Catalogue</a>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Welcome Back, <?php echo $_SESSION['user']['username']; ?>!
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item" type="button">Edit Profile</button></li>
                            <li><button class="dropdown-item" type="button"><a href="../home.php?logout='1'" class="text-decoration-none text-black">Logout</a></button></li>
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
<?php
if(isset($_GET['id']))
{
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM banner WHERE product_id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $banners = mysqli_fetch_array($query_run);
?>

<form method="post" action="Banner.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="product_id" value="<?php echo $banners['product_id']; ?>">

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Product Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_name" value="<?php echo $banners['product_name']?>">
                </div>
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Description</label>
                <div class="col-md-9">
                    <textarea type="text" class="form-control" rows="6" name="product_description"><?php echo $banners['product_description']?></textarea>
                </div>
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Price</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" class="form-control" name="product_price" value="<?php echo $banners['product_price']?>">
                </div>
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Offer Percentage</label>
                <div class="col-md-9">
                    <div class=" input-group">
                        <input type="number" step="1" class="form-control" name="product_offer" value="<?php echo $banners['product_offer']?>">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
                
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Offer Starting Date</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="product_date_start" value="<?php echo $banners['product_date_start']?>">
                </div>
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Offer Ended Date</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="product_date_end" value="<?php echo $banners['product_date_end']?>">
                </div>
            </div>
        
            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-3">Image</label>
                <div class="col-md-9">
                    <img src="uploadedimage\<?php echo $banners['images']; ?>" class="border rounded bg-white" style="height: 100px;">
                    <input type="file" name="images" class="mt-2 form-control">
                </div>
            </div>

            <div class="form-group row col-md-5 p-3 mx-auto">
                <label class="col-form-label col-md-1"></label>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-primary" name="update_banner">Update</button>
                </div>
            </div>
        </div>
    </div>

</form>
<?php
    }
}
?>


<div class="container-fluid border" style="width: 100%;">
  <footer class="py-1 my-2">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="admin.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Booking</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Notification</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Enquiry Page</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Customer Service</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Report</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product Catalogue</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
