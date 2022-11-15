<?php
require 'dbcon.php';

$errors1  = array();

if(isset($_POST['update_user']))
{
	
    $user_id = mysqli_real_escape_string($con,$_POST['id']);
    $name =  mysqli_real_escape_string($con,$_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactnum =  mysqli_real_escape_string($con,$_POST['contactnum']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    
	
	if (!preg_match ('/^[\p{L} ]+$/u', $name) ) { 
		array_push($errors1, 'Only alphabets and whitespace are allowed.');
	}
	
    if (count($errors1) == 0) {

        $query = "UPDATE users SET full_name='$name', email='$email', contact_number='$contactnum', birthday='$birthday',username='$username'  WHERE id='$user_id' ";
        mysqli_query($con, $query);
		array_push($errors1, "success to update");
		echo"<script> alert('Success!'); window.location.assign('Profile.php?id={$user_id}') </script>"; 
       
    }else{ 
		echo"<script> alert('fail');window.history.replaceState( $errors1, '', 'editProfile.php?id={$user_id}'); </script>"; 
    }

}

function display_error1() {
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