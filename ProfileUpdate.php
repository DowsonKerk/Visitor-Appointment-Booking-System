<?php
session_start();
require 'dbcon.php';



if(isset($_POST['update_user']))
{

    $errors  = array(); 

    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactnum = mysqli_real_escape_string($con, $_POST['contactnum']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    
    if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($contactnum)) { 
		array_push($errors, "Contact number is required"); 
	}
    if (empty($birthday)) { 
		array_push($errors, "Birthday is required"); 
	}

    if (count($errors) == 0) {

        $query = "UPDATE users SET full_name='$name', email='$email', contact_number='$contactnum', birthday='$birthday',username='$username'  WHERE id='$user_id' ";
        mysqli_query($con, $query);
        header("Location: profile.php?id={$user_id}");
        exit(0);

    }else{

        
        header("Location: profile.php?id={$user_id}");
        exit(0);

    }

}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

?>