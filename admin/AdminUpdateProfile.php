<?php

include('../dbcon.php');

$errors1  = array();

if(isset($_POST['adminUpdate_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['id']);

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactnum = mysqli_real_escape_string($con, $_POST['contact_number']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);


    if (!preg_match ('/^[\p{L} ]+$/u', $name) ) { 
		array_push($errors1, 'Only alphabets and whitespace are allowed.');
	}

    if (count($errors1) == 0) {

        $query = "UPDATE users SET full_name='$name', email='$email', contact_number='$contactnum', birthday='$birthday',username='$username'  WHERE id='$user_id' ";
        mysqli_query($con, $query);
		array_push($errors1, "success to update");
		echo"<script> alert('Success!'); window.location.assign('adminManage.php'); </script>"; 
       

    }else{ 
		echo"<script> alert('Fail to update');window.history.replaceState( $errors1, '', 'adminManage.php'); </script>"; 
    }

}

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Deleted Successfully";
        header("Location: adminManage.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Deleted";
        header("Location: adminManage.php");
        exit(0);
    }
}


function display_error2() {
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