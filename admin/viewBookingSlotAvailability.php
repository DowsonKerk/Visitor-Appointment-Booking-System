<?php
    session_start();
	error_reporting(0);
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
<!DOCTYPE html>
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
        <a class="navbar-brand" href="admin.php">
            <img src="..\images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item p-1">
                    <a class="nav-link" href="admin.php">Home</a>
                </li>

                <li class="nav-item p-1">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Booking
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
							<li><button class="dropdown-item" type="button" onclick="location.href='addBookingSlotAvailability.php'">Add Booking Slot Availability</button></li>
                            <li><button class="dropdown-item" type="button" onclick="location.href='searchBookingSlotAvailability.php?Id=E'">Edit Booking Slot Availability</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='searchBookingSlotAvailability.php?Id=V'">View Booking Slot Availability</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='editBookedSlot.php'">Add Booked Slot</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='searchBookedSlot.php?Id=E'">Edit Booked Slot</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='searchBookedSlot.php?Id=V'">View Booked Slot</button></li>

						</ul>
                    </div>
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
                            <li><button class="dropdown-item" type="button" onclick="location.href='adminManage.php'">Edit Profile</button></li>
                            <li><button class="dropdown-item" type="button"><a href="../home.php?logout='1'" class="text-decoration-none text-black">Logout</a></button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
</br></br></br>
<?php
	if(isset($_POST["btnBack"]))
	{
		echo "<script>location = 'searchBookingSlotAvailability.php';</script>";
	}
	$SQL = "SELECT * FROM tblBookingSlot WHERE tblBookingSlot.bookingSlotId = '".$_GET['Id']."'";
	$Result = mysqli_query($con, $SQL);
	if(mysqli_num_rows($Result) > 0)
	{
		$bookingSlotRec = mysqli_fetch_array($Result);
	}
?>
	<div class="container-contact100">
		<form method="POST" enctype="multipart/form-data">
			<span class="contact100-form-title">
				View Booking Slot Availability
			</span>
			<div class="wrap-contact100">		
				<div class="wrap-input100 validate-input"><span class="label-input100">Booking Slot Availability Id</span></br>
					<input class="input100" type="text" name="bookingSlotId" value="<?php echo $_GET['Id'] ;?>" required autofocus autocomplete="off" readonly="readonly">
				<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input"><span class="label-input100">Booking Slot Availability Date</span></br>
					<input class="input100" type="text" name="bookingSlotDate" value="<?php echo $bookingSlotRec["bookingSlotDate"];?>" required autofocus autocomplete="off" readonly="readonly">

				<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input"><span class="label-input100">Booking Slot Availability Time</span></br>
					<input class="input100" type="text" name="bookingSlotTime" value="<?php echo $bookingSlotRec["bookingSlotTime"];?>" required autofocus autocomplete="off" readonly="readonly">
				<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input"><span class="label-input100">Booking Slot Availability Status</span></br>
					<input class="input100" type="text" name="bookingSlotStatus" value="<?php echo $bookingSlotRec["bookingSlotStatus"];?>" required autofocus autocomplete="off" readonly="readonly">
				<span class="focus-input100"></span>
				</div>
				
				<br/>
				
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit" name="btnBack">
							<span>
								Back
							</span>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<div class="container-fluid border" style="width: 100%;">
  <footer class="py-1 my-2">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="admin.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product</a></li>
      <li class="nav-item"><a href="notification_admin.php" class="nav-link px-2 text-muted">Notification</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Enquiry Page</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Customer Service</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Report</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Product Catalogue</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>