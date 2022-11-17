<?php 

include("dbcon.php");

$reviewid = $_GET["id"];

$sql = "DELETE FROM tblReview WHERE review_id = '$reviewid'";

if(!mysqli_query($con, $sql)) {
    echo "<script>alert('Delete Review Failed'); window.history.go(-1);</script>";
    exit();
} else {
    echo "<script>alert('Delete Riview Successfully'); window.location='admin.php';</script>";
    exit();
}


?>