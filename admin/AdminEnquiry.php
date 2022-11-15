<?php

include('../dbcon.php');

$errors1 = array();

if(isset($_POST['delete_enquiry']))
{
    if (count($errors1) == 0)
    {
        $form_id = mysqli_real_escape_string($con, $_POST['delete_enquiry']);
        $query = "DELETE FROM enquiry WHERE form_Id='$form_id' ";
        $query_run = mysqli_query($con, $query);

        echo"<script> alert('Form Deleted Successfully'); window.location.assign('enquiryManage.php') </script>"; 
        $errors1 = "Form Deleted Successfully";

        
    }
    else
    {
        echo"<script> alert('Fail to delete'); window.location.assign('enquiryManage.php') </script>"; 
        $errors1 = "Form Not Deleted";
        
    }

}

function display_error_enquiry() {
	global $errors1;

	if (count($errors1) > 0){
		echo '<div class="error">';
			foreach ($errors1 as $error1){
				echo $error1 .'<br>';
			}
		echo '</div>';
	}
}
?>