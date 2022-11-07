<?php 

include("dbcon.php");

$bookedid = $_GET["id"];

$sql = "DELETE FROM tblbookedslot WHERE bookedSlotId = '$bookedid'";
$sql3 = "SELECT * FROM tblbookedslot WHERE bookedSlotId = '$bookedid'";
        $Result = mysqli_query($con, $sql3);
        if(mysqli_num_rows($Result) > 0)
        {
            $BookingSlotRec = mysqli_fetch_array($Result);
        }

if(mysqli_num_rows($Result) > 0)
{
    $sql2 = "INSERT INTO tbldeleted (bookedSlotId, bookingSlotId, bookedBy) VALUES ('".$BookingSlotRec['bookedSlotId']."', '".$BookingSlotRec['bookingSlotId']."', '".$BookingSlotRec['bookedBy']."')";
    mysqli_query($con, $sql2);
}

if(!mysqli_query($con, $sql)) {
    echo "<script>alert('Delete Booking Failed'); window.history.go(-1);</script>";
    exit();
} else {
    echo "<script>alert('Delete Booking Successfully'); window.location='home.php';</script>";
    exit();
}


?>