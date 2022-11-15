<?php
require 'dbcon.php';

$errors2  = array(); 

if(isset($_POST['post_enquiry']))
{
	
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $enquiryEmail = mysqli_real_escape_string($con, $_POST['enquiryEmail']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $Comments = mysqli_real_escape_string($con, $_POST['Comments']);
    
    if (!preg_match ('/^[\p{L} ]+$/u', $fullName) ) { 
		array_push($errors2, 'Only alphabets and whitespace are allowed.');
	}


    if (count($errors2) == 0) {

        $query = "INSERT INTO enquiry (full_name, email, phone_number, user_subject, comment ) VALUES('$fullName','$enquiryEmail','$phoneNumber', '$subject', '$Comments')";
        mysqli_query($con, $query);
		array_push($errors2, "Success to send the form");
		echo"<script> alert('Success!'); window.location.assign('enquiryPage.php') </script>"; 

    }else{ 

        array_push($errors2, "Fail to send the form"); 
        echo"<script> alert('fail');window.history.replaceState( $errors2, '', 'enquiryPage.php'); </script>"; 

    }

}


function display_error2() {
	global $errors2;

	if (count($errors2) > 0){
		echo '<div class="error">';
			foreach ($errors2 as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

?>