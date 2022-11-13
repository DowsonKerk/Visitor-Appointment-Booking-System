<?php

include('../dbcon.php');



if(isset($_POST['delete_enquiry']))
{
    $form_id = mysqli_real_escape_string($con, $_POST['delete_enquiry']);

    $query = "DELETE FROM enquiry WHERE form_Id='$form_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Form Deleted Successfully";
        header("Location: enquiryManage.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Form Not Deleted";
        header("Location: enquiryManage.php");
        exit(0);
    }
}
?>