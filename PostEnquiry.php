<?php


$errors2  = array(); 

if(isset($_POST['post_enquiry']))
{
	
	require 'dbcon.php';
	global $errors2;

    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $enquiryEmail = mysqli_real_escape_string($con, $_POST['enquiryEmail']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $Comments = mysqli_real_escape_string($con, $_POST['Comments']);
    
    if (empty($fullName)) { 
		array_push($errors2, "Full name is required"); 
	}
	if (empty($enquiryEmail)) { 
		array_push($errors2, "Email is required"); 
	}
	if (empty($phoneNumber)) { 
		array_push($errors2, "Contact number is required"); 
	}
    if (empty($subject)) { 
		array_push($errors2, "Subject is required"); 
	}
    if (empty($Comments)) { 
		array_push($errors2, "Comments is required"); 
	}


    if (count($errors2) == 0) {

        $query = "INSERT INTO enquiry (full_name, email, phone_number, user_subject, comment ) VALUES('$fullName','$enquiryEmail','$phoneNumber', '$subject', '$Comments')";
        mysqli_query($con, $query);
		header("Location: enquiryPage.php?id={$user_id}");
        exit(0);

    }else{ 

        array_push($errors2, "Fail to update"); 
        header("Location: enquiryPage.php?id={$user_id}");
        exit(0);

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