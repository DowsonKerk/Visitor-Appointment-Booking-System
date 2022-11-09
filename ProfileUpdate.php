<?php
require 'dbcon.php';

 
$errors1  = array(); 



if(isset($_POST['update_user']))
{

    require 'dbcon.php';
	

    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactnum = mysqli_real_escape_string($con, $_POST['contactnum']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    
    if (empty($username)) { 
		array_push($errors1, "Username is required"); 
	}

	if (empty($email)) { 
		array_push($errors1, "Email is required"); 
	}
	if (!preg_match ("/^[a-zA-z]*$/", $name) ) { 
		array_push($errors1, "Only alphabets and whitespace are allowed.");
	}
	
	if (empty($contactnum)) { 
		array_push($errors1, "Contact number is required"); 
	}
    if (empty($birthday)) { 
		array_push($errors1, "Birthday is required"); 
	}

    if (count($errors1) == 0) {

        $query = "UPDATE users SET full_name='$name', email='$email', contact_number='$contactnum', birthday='$birthday',username='$username'  WHERE id='$user_id' ";
        mysqli_query($con, $query);
        header("Location: profile.php?id={$user_id}");
        exit(0);

    }else{ 

        array_push($errors1, "Fail to update"); 
        header("Location: editProfile.php?id={$user_id}");
        exit(0);

    }

}

function display_error1() {
	global $errors1;

	if (count($errors1) > 0){
		echo '<div class="error">';
			foreach ($errors1 as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

?>