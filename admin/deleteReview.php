<?php
    session_start();
    include('dbcon.php');
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
        <a class="navbar-brand" href="admin.php">
            <img src="..\images\logo.png" alt="logo" style="width:250px;" class="rounded-pill"> 
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
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                             Notification
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xxl" style="width: 450px">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class="nav-link text-black active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Upcoming Booking</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-black" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Updated Booking</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-black" id="push-tab" data-bs-toggle="tab" data-bs-target="#push-tab-pane" type="button" role="tab" aria-controls="push-tab-pane" aria-selected="false">Cancelled Booking</button>
                            </li>  
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <?php
                                    $sql = "SELECT * FROM tblbookingslot ORDER BY bookingSlotTimeNotif DESC";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["bookingSlotDate"] ?> <?php echo $row["bookingSlotTimeNotif"] ?></i></small><br>
                                    <?php echo "Reminder"; ?><br>
                                    <?php echo "Appointment at "; ?><?php echo $row["bookingSlotTime"]; ?><?php echo " in slot " ?>
                                    <?php echo $row["bookingSlotId"]; ?>
                                    </li></button>
                                <?php }
                                }?>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <?php
                                    // $sql = "SELECT * FROM tblbookedslot INNER JOIN tblbookingslot ON tblbookedslot.bookedSlotId = tblbookingslot.bookingSlotId ORDER BY create_on DESC LIMIT 3";
                                    //$id = mysqli_real_escape_string($con, $_SESSION['user']['id']);
                                    $sql = "SELECT * FROM tblbookedslot ORDER BY create_on DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["create_on"]; ?></i></small><br>
                                    <?php echo $row["bookingSlotId"]; ?><br> <?php echo "booked by ID "; ?>
                                    <?php echo $row["bookedBy"]; ?>
                                    </li></button>
                                <?php }
                                }?>
                                </div>
                                <div class="tab-pane fade" id="push-tab-pane" role="tabpanel" aria-labelledby="push-tab" tabindex="0">
                                <?php
                        
                                    // $sql = "SELECT * FROM tblbookedslot INNER JOIN tblbookingslot ON tblbookedslot.bookedSlotId = tblbookingslot.bookingSlotId ORDER BY create_on DESC LIMIT 3";
                                    $sql = "SELECT * FROM tbldeleted ORDER BY create_on DESC LIMIT 5";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0){
                                        while ($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <li><button class="dropdown-item border" type="button">
                                    <small><i><?php echo $row["create_on"] ?></i></small><br>
                                    <?php echo "Booking Canceled"; ?><br> 
                                    <?php echo "Appointment at "; ?><?php echo $row["bookedSlotId"]; ?> <?php echo "has been cancelled."; ?><br>
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
							<li><button class="dropdown-item" type="button" onclick="location.href='adminReview.php'">View Review</button></li>
							<li><button class="dropdown-item" type="button" onclick="location.href='deleteReview.php'">Delete Review</button></li>
						</ul>
                    </div>
                </li>

                <li class="nav-item p-1">
                <a class="nav-link" href="enquiryManage.php">Enquiry Page</a>
                </li>
                
                <li class="nav-item p-1">
                <a class="nav-link active" href="admincustomerservice.php">Customer Service</a>
                </li>

                <!--<li class="nav-item p-1">
                    <a class="nav-link" href="#">Report</a>
                </li>-->
                
                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Product Catalogue
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
							<li><button class="dropdown-item" type="button" onclick="location.href='addProductCatalogue.php'">Add Product Catalogue</button></li>
                            <li><button class="dropdown-item" type="button" onclick="location.href='searchProductCatalogue.php?Id=E'">Edit Product Catalogue</button></li>    
                            <li><button class="dropdown-item" type="button" onclick="location.href='searchProductCatalogue.php?Id=V'">View Product Catalogue</button></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Welcome Back, <?php echo $_SESSION['user']['username']; ?>!
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item" type="button" onclick="location.href='adminManage.php'">Edit Profile</button></li>
                            <li><a href="../home.php?logout='1'" class="text-decoration-none text-black"><button class="dropdown-item" type="button">Logout</button></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
	$SQL = "SELECT * FROM tblReview";
	$Result = mysqli_query($con, $SQL);
    
	if(mysqli_num_rows($Result) > 0)
	{
?>
	<div class="container-contact100">
		<div class="wrap-contact100">
            <br/>							
            <div><h3 class="mt-5 mb-5">Delete Review Here</h3></div>
				<form class="contact100-form validate-form" method="POST">
					<table id="example" class="table table-bordered table-hover">
				 		<thead>
                         <tr>
                                <th>Review ID</th>
            					<th>User Name</th>
								<th>User Rating</th>
								<th>User Review</th>
           					</tr>
                  		</thead>
                		<tbody>
						<?php
							for($i = 0; $i < mysqli_num_rows($Result); $i++)
							{
								$RecRow = mysqli_fetch_array($Result);
								echo "<tr class = \"Row\"";
								echo ">";
								echo "<td>".$RecRow['review_id']."</td>";
								echo "<td>".$RecRow['user_name']."</td>";
								echo "<td>".$RecRow['user_rating']."</td>";
                                echo "<td>".$RecRow['user_review']."</td>";
                                echo "<td>"?><a href="reviewProcess.php?id=<?php echo $RecRow["review_id"]; ?>" class="btnLogout" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td><?php
								echo "</tr>";
							}
						?>
					  	</tbody>
					</table>
				</form>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<center><button type="submit" class="contact100-form-btn" onclick="history.back()">
							Back					
						</button></center>
					</div>
				</div>			
			</div>
		</div>
	<?php
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
    <p class="text-center text-muted">?? 2022 Cacti-Succulent Kuching</p>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>