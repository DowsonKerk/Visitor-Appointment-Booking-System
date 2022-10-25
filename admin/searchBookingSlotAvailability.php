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
	$SQL = "SELECT * FROM tblBookingSlot";

	if(trim($_POST['txtBID']) != "" && trim($_POST['bookingSlotDate']) == "" )
	{
		$SQL .= " WHERE tblBookingSlot.bookingSlotId = '".strtoupper(trim($_POST['txtBID']))."'";	
	}
	if(trim($_POST['bookingSlotDate']) != "" && trim($_POST['txtBID']) == "")
	{
		$SQL .= " WHERE tblBookingSlot.bookingSlotDate = '".strtoupper(trim($_POST['bookingSlotDate']))."'";	
	}
	if(trim($_POST['bookingSlotDate']) != "" && trim($_POST['txtBID']) != "")
	{
		$SQL .= " WHERE tblBookingSlot.bookingSlotId = '".strtoupper(trim($_POST['txtBID']))."' AND tblBookingSlot.bookingSlotDate = '".strtoupper(trim($_POST['bookingSlotDate']))."'";	
	}
	$Result = mysqli_query($con, $SQL);
	if(mysqli_num_rows($Result) > 0)
	{
	?>
		<div class="container-contact100">
			<div class="wrap-contact100">							
				<span class="contact100-form-title">
					<?php if($_GET['Id'] == "E") echo "Edit Booking Slot Availability"; 
						else echo "Booking Slot Availability List"; ?>
				</span>
			
                <div class="callout callout-warning">
				 <?php 
				 	if($_GET["Id"] == "E")	echo "<h5>Click the list row to edit booking slot availability!</h5>"; 
		 			else echo "<h5>Click the list row to view booking slot availability!</h5>";  ?>
                </div>
         		<br/>
				<form class="contact100-form validate-form" method="POST">
					<table id="example" class="table table-bordered table-hover">
				 		<thead>
                			<tr>
            					<th>Booking Slot Availability Id</th>
								<th>Booking Slot Availability Date</th>
								<th>Booking Slot Availability Time</th>
								<th>Booking Slot Availability Status</th>
           					</tr>
                  		</thead>
                		<tbody>
						<?php
							for($i = 0; $i < mysqli_num_rows($Result); $i++)
							{
								$RecRow = mysqli_fetch_array($Result);
								echo "<tr class = \"Row\"";
								if($_GET['Id'] == "E")
								echo "onclick = \"location = 'addBookingSlotAvailability.php?Id=".$RecRow['bookingSlotId']."'\"";
								else echo  "onclick = \"location = 'viewBookingSlotAvailability.php?Id=".$RecRow['bookingSlotId']."'\"";
								echo ">";
								echo "<td>".$RecRow['bookingSlotId']."</td>";
								echo "<td>".$RecRow['bookingSlotDate']."</td>";
								echo "<td>".$RecRow['bookingSlotTime']."</td>";
								echo "<td>".$RecRow['bookingSlotStatus']."</td>";
								echo "</tr>";
								$_SESSION['bookingId'] = $RecRow['bookingSlotId'];
							}
						?>
					  	</tbody>
					</table>
				</form>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn" onclick="history.back()">
							Back					
						</button>
					</div>
				</div>			
			</div>
		</div>
	<?php
	}	
 	else
	{
		if($_GET['Id'] == "E") 
			echo"<script>alert('Fail to search Booking Slot Availability, try again!')
			location = 'searchBookingSlotAvailability.php?Id=E';</script>";
		else
			echo "<script>alert('Fail to search Booking Slot Availability, try again!')
			location = 'searchBookingSlotAvailability.php';</script>";
	} 		
?>		
</body>
</html>
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