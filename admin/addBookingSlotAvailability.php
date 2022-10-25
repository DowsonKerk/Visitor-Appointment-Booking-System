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
        <a class="navbar-brand" href="#">
            <img src="..\images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item p-1">
                    <a class="nav-link active" href="#">Home</a>
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
	$bookingSlotId = strtoupper(trim($_POST['txtbookingSlotId']));
	$bookingSlotDate = strtoupper(trim($_POST['bookingSlotDate']));
	$bookingSlotTime = strtoupper(trim($_POST['bookingSlotTime']));
	$bookingSlotStatus = strtoupper(trim($_POST['bookingSlotStatus']));
	
	if(isset($_POST["btnSave"]))
	{
		$UpdateBookingSlot = mysqli_query($con, "UPDATE tblBookingSlot SET bookingSlotDate = '".$bookingSlotDate."', bookingSlotTime = '".$bookingSlotTime."', bookingSlotStatus = '".$bookingSlotStatus."' WHERE bookingSlotId = '".$_GET['Id']."'");
		if($UpdateBookingSlot)
		{	
			echo "<script>alert('Booking Slot Updated Successfully!')
			location = 'searchBookingSlotAvailability.php?Id=E';</script>";	
		}
	}
	if(isset($_POST["btnAdd"]))
	{		
		$Check = "SELECT * FROM tblBookingSlot WHERE bookingSlotDate = '".$bookingSlotDate."' AND bookingSlotTime = '".$bookingSlotTime."' AND bookingSlotStatus = 'OPEN'";
		$CheckResult = mysqli_query($con, $Check);
		if(mysqli_num_rows($CheckResult) > 1)
		{
			echo "<script>alert('Booking Slot not available, try again!')
			location = 'addBookingSlotAvailability.php';</script>";
		}
		else
		{		
			$SQL = "SELECT COUNT(bookingSlotId) AS foundbooking FROM tblBookingSlot";
			$Result = mysqli_query($con, $SQL);
			$Row = mysqli_fetch_array($Result);
			$BID= "1" + $Row['foundbooking'];
			$bookingSlotId = "BID-".sprintf('%04d',$BID);
			$AddBookingSlot = mysqli_query($con, "INSERT INTO tblBookingSlot(bookingSlotId, bookingSlotDate, bookingSlotTime, bookingSlotStatus)
			VALUES('$bookingSlotId', '$bookingSlotDate', '$bookingSlotTime', '$bookingSlotStatus')");
			if($AddBookingSlot)
			{	
				echo "<script>alert('Add Booking Slot Successfully!')
				location = 'addBookingSlotAvailability.php';</script>";	
			}
		}	
	}
	if($_GET['Id'] != "") 
	{
		$SQL = "SELECT * FROM tblBookingSlot WHERE bookingSlotId = '".$_GET['Id']."'";
		$Result = mysqli_query($con, $SQL);
		if(mysqli_num_rows($Result) > 0)
		{
			$BookingSlotRec = mysqli_fetch_array($Result);
		}
	}
?>
	<div class="container-contact100">
		<form method="POST" enctype="multipart/form-data" >
			<span>
				<?php 
				if($_GET['Id'] != "") echo "Edit Booking Slot Availability"; 
				else echo "Add Booking Slot Availability"; 
				?>
			</span>
			<div>		
				<div class="wrap-input100 validate-input" data-validate = "Booking Slot Availability ID is required">
					<span class="label-input100">Booking Slot Availability ID</span>
					<input class="input100" type="text" name="txtbookingSlotId" id="txtbookingSlotId" value="<?php if($_GET['Id'] != "") echo $_GET['Id'];
					else 
					{
						$SQL = "SELECT COUNT(bookingSlotId) AS foundbooking FROM tblBookingSlot";
						$Result = mysqli_query($con, $SQL);
						$Row = mysqli_fetch_array($Result);
						$BID= "1" + $Row['foundbooking'];
						echo $bookingSlotId = "BID-".sprintf('%04d',$BID);
					}?>" readonly="readonly"/>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Date is required">
					<span class="label-input100">Date</span>
					<div>
						<input class="input100" type="date" id="bookingSlotDate" name="bookingSlotDate" placeholder="Date(dd-mmm-yy)" min=<?php echo date('Y-m-d');
     					?> required value="<?php echo $BookingSlotRec['bookingSlotDate'];?>"/>
					</div>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "Time is required">
					<span class="label-input100">Time</span>
					<div>
					<select class="custom-select" name="bookingSlotTime" required>
							<option selected disabled value="">Choose Booking Slot Time...</option>
							<?php 
                            $timee = array("8:00:00", "9:00:00", "10:00:00", "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00", "16:00:00");
                              for($i = 0; $i < count($timee); $i++)
                            {
                                echo "<option value = ".$timee[$i]."";
                                if($BookingSlotRec['bookingSlotTime'] == $timee[$i])
                                echo "SELECTED"; 
                                echo ">".$timee[$i]."</option>";
                            } 
                              ?>
						</select>
					</div>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Status is required">
					<span class="label-input100">Status</span>
					<div>
						<select class="custom-select" name="bookingSlotStatus" id="bookingSlotStatus" required>
							<option selected disabled value="">Choose Status...</option>
							<?php 
							$Status = array("Open", "Close");
	  						for($i = 0; $i < count($Status); $i++)
							{
								echo "<option value = \"".$Status[$i]."\"";
								if($BookingSlotRec['bookingSlotStatus'] == $Status[$i])
								echo "SELECTED"; 
								echo ">".$Status[$i]."</option>";
							} 
	  						?>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

			</div>	
			<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
					<div class="contact100-form-bgbtn"></div>
					<button class="contact100-form-btn" type="submit" name="<?php if($_GET['Id'] != "")echo "btnSave"; else echo "btnAdd"; ?>">
						<span>
							<?php if($_GET['Id'] != "") echo "Save"; else echo "Add"; ?>
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
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