<?php
session_start();
error_reporting(0);
include('dbcon.php');
include('Account.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<!-- Logined normal user -->
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
                    <a class="nav-link q" href="home.php">Home</a>
                </li>

                <li class="nav-item p-1">
                <a class="nav-link" href="productcatalogue.php">Product</a>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Booking
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item active" type="button" onclick="location.href='addBooking.php'">Add Booking</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='editBooking.php'">Edit Booking</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='editBooking.php?Id=V'">View Booking</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='cancelBooking.php?Id=D'">Cancel Booking</button></li>
						</ul>
                    </div>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown" >
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                             Notification
                        </button>   
                        <ul class="dropdown-menu"  style="width: 450px">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" >
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Promotion</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Reminder</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="false">Booking Update</button>
                                </li> 
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black" id="push-tab" data-bs-toggle="tab" data-bs-target="#push-tab-pane" type="button" role="tab" aria-controls="push-tab-pane" aria-selected="false">Booking Cancel</button>
                                </li>   
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <?php
                                    $sql = "SELECT * FROM banner ORDER BY create_on DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["create_on"] ?></i></small><br>
                                    <?php echo "Promotion On"; ?> <?php echo $row["product_name"]; ?><br>
                                    <?php echo "Promotion ended at "; ?><?php echo $row["product_date_end"]; ?>
                                    </li></button>
                                <?php }
                                }else echo "<li><button class="."dropdown-item border text-align-center"." type="."button".">No Promotion</li>";?>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <?php
                                    $id = mysqli_real_escape_string($con, $_SESSION['user']['id']);
                                    //$sql = "SELECT  FROM tblbookedslot INNER JOIN tblbookingslot ON tblbookedslot.bookedSlotId = tblbookingslot.bookingSlotId ORDER BY create_on DESC LIMIT 5";
                                    $sql = "SELECT * FROM tblbookingslot ORDER BY bookingSlotTimeNotif DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["bookingSlotDate"] ?> <?php echo $row["bookingSlotTimeNotif"] ?></i></small><br>
                                    <?php echo "Reminder"; ?><br> 
                                    <?php echo "You have an appointment at "; ?><?php echo $row["bookingSlotTime"]; ?><br>
                                    </li></button>
                                <?php }
                                }else echo "<li><button class="."dropdown-item border text-center"." type="."button".">No Appoinment Made</li>";?>
                                </div>
                                <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab" tabindex="0">
                                <?php
                                    // $sql = "SELECT * FROM tblbookedslot INNER JOIN tblbookingslot ON tblbookedslot.bookedSlotId = tblbookingslot.bookingSlotId ORDER BY create_on DESC LIMIT 3";
                                    $id = mysqli_real_escape_string($con, $_SESSION['user']['id']);
                                    $sql = "SELECT * FROM tblbookedslot WHERE bookedBy= $id ORDER BY create_on DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["create_on"] ?> </i></small><br>
                                    <?php echo "You have booked an appointment at "; ?>
                                    <?php echo $row["create_on"]; ?><br>
                                    </li></button>
                                <?php }
                                }else echo "<li><button class="."dropdown-item border"." type="."button".">No Booked Appoinment</li>";?>


                                </div>
                                
                                <div class="tab-pane fade" id="push-tab-pane" role="tabpanel" aria-labelledby="push-tab" tabindex="0">
                                <?php
                                    $id = mysqli_real_escape_string($con, $_SESSION['user']['id']);
                                    // $sql = "SELECT * FROM tblbookedslot INNER JOIN tblbookingslot ON tblbookedslot.bookedSlotId = tblbookingslot.bookingSlotId ORDER BY create_on DESC LIMIT 3";
                                    $sql = "SELECT * FROM tbldeleted WHERE bookedBy= $id ORDER BY create_on DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["create_on"] ?></i></small><br>
                                    <?php echo "Your appointment at "; ?><?php echo $row["bookedSlotId"]; ?> <?php echo "has been cancelled."; ?><br>
                                    </li></button>
                                <?php }
                                }else echo "<li><button class="."dropdown-item border"." type="."button".">No Canceled Appoinment</li>"; ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Review
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item active" type="button" onclick="location.href='addReview.php'">Add Review</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='editReview.php'">Edit Review</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='viewReview.php'">View Review</button></li>
						</ul>
                    </div>
                </li>                

                <li class="nav-item p-1">
                <a class="nav-link" href="enquiryPage.php">Enquiry Page</a>
                </li>
                
                <li class="nav-item p-1">
                    <a class="nav-link" href="customerservice.php">Customer Service</a>
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
                            </br></br>

    <?php
    $bookedSlotId = strtoupper(trim($_POST['txtbookedSlotId']));
    $piece = strtoupper(trim($_POST['bookingSlotId']));
    $ppiece = explode(" ", $piece);
    $bookingSlotId = $ppiece[0];
    $bookedBy = $_SESSION['user']['id'];
	
	if(isset($_POST["btnSave"]))
	{
		$UpdateBookingSlot = mysqli_query($con, "UPDATE tblBookedSlot SET bookingSlotId = '".$bookingSlotId."', bookedBy = '".$bookedBy."' WHERE bookedSlotId = '".$_GET['Id']."'");
		if($UpdateBookingSlot)
		{	
			echo "<script>alert('Booked Slot Updated Successfully!')
			location = 'home.php';</script>";	
		}
	}
	if(isset($_POST["btnAdd"]))
	{		
		$Check = "SELECT * FROM tblBookedSlot WHERE bookingSlotId = '".$bookingSlotId."' AND bookedBy = '".$bookedBy."'";
		$CheckResult = mysqli_query($con, $Check);
		if(mysqli_num_rows($CheckResult) > 1)
		{
			echo "<script>alert('Booked Slot not available, try again!')
			location = 'addBooking.php';</script>";
		}
		else
		{		
			$SQL = "SELECT COUNT(bookedSlotId) AS foundbooked FROM tblBookedSlot";
			$Result = mysqli_query($con, $SQL);
			$Row = mysqli_fetch_array($Result);
			$AID= "1" + $Row['foundbooked'];
			$bookedSlotId = "AID-".sprintf('%04d',$AID);
			$AddBookedSlot = mysqli_query($con, "INSERT INTO tblBookedSlot(bookedSlotId, bookingSlotId, bookedBy)
            VALUES('$bookedSlotId', '$bookingSlotId', '$bookedBy')");
			if($AddBookedSlot)
			{	
				echo "<script>alert('Add Booked Slot Successfully!')
				location = 'home.php';</script>";	
			}
		}	
	}
	if($_GET['Id'] != "") 
	{
		$SQL = "SELECT * FROM tblBookedSlot WHERE bookedSlotId = '".$_GET['Id']."'";
		$Result = mysqli_query($con, $SQL);
		if(mysqli_num_rows($Result) > 0)
		{
			$bookedSlotRec = mysqli_fetch_array($Result);
		}
	}
?>
    </br>
	<div class="row">
		<form method="POST" enctype="multipart/form-data">
			<span>
				<?php 
				if($_GET['Id'] != "") echo "<h4>Edit Booked Slot Time</h4>"; 
				else echo "<h4>Add Booking For Appointment</h4>"; 
				?>
			</span>
			<div>		
				<div class="form-group row col-md-5 p-3 mx-auto" data-validate = "Booked Slot ID is required">
					<span class="label-input100">Booked Slot ID:</span>
					<input class="form-control" type="text" name="txtbookedSlotId" value="<?php if($_GET['Id'] != "") echo $_GET['Id'];
					else 
					{
						$SQL = "SELECT COUNT(bookedSlotId) AS foundbooked FROM tblBookedSlot";
						$Result = mysqli_query($con, $SQL);
						$Row = mysqli_fetch_array($Result);
						$AID= "1" + $Row['foundbooked'];
						echo $bookedSlotId = "AID-".sprintf('%04d',$AID);
					}?>" readonly="readonly"/>
					<span class="focus-input100"></span>
				</div></br>

				<div class="form-group row col-md-5 p-3 mx-auto" data-validate = "Booking Slot Id is required">
					<span class="label-input100">Choose Booking Slot Date & Time:</span>
						<select class="custom-select" name="bookingSlotId" id="bookingSlotId" required>
							<option selected disabled value="">Choose Here...</option>
							<?php 
								$SQL = "SELECT * FROM tblbookingSlot WHERE tblbookingSlot.bookingSlotStatus = 'OPEN'";
								$Result = mysqli_query($con, $SQL);
								$List = array();
								while($Row = mysqli_fetch_array($Result))
								{
									$List[] = $Row;
								}
								for($i = 0; $i < count($List); $i++)
								{
									echo "<option value = \"".$List[$i]["bookingSlotId"]." ".$List[$i]["bookingSlotDate"]." ".$List[$i]["bookingSlotTime"]."\"";
									if($bookedSlotRec["bookingSlotId"] == strtoupper($List[$i]["bookingSlotId"])) 
									echo "SELECTED"; 
									echo ">".$List[$i]["bookingSlotId"]." ".$List[$i]["bookingSlotDate"]." ".$List[$i]["bookingSlotTime"]."</option>";
								} 		
	  							?>
						</select>
					<span class="focus-input100"></span>
				</div>	
			</div></br>

			<div class="row">
				<div class="form-group row col-md-5 p-3 mx-auto">
					<div class="col-md-7">
					
                        <center><button class="btn btn-primary" type="submit" name="<?php if($_GET['Id'] != "")echo "btnSave"; else echo "btnAdd"; ?>">
						<span>
							<?php if($_GET['Id'] != "") echo "Save"; else echo "Add"; ?>
		
						</span>
					    </button>
                        <button type="submit" class="btn btn-primary" onclick="history.back()">Back</button></center>
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
      <li class="nav-item"><a href="home.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="productcatalogue.php" class="nav-link px-2 text-muted">Product</a></li>
      <li class="nav-item"><a href="enquiryPage.php" class="nav-link px-2 text-muted">Enquiry Page</a></li>
      <li class="nav-item"><a href="customerservice.php" class="nav-link px-2 text-muted">Customer Service</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>