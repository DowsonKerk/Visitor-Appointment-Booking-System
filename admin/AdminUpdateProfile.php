<?php

include('../dbcon.php');

if(isset($_POST['adminUpdate_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['id']);

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactnum = mysqli_real_escape_string($con, $_POST['contact_number']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);

    $query = "UPDATE users SET full_name='$name', email='$email', 
    contact_number='$contactnum', birthday='$birthday',username='$username'  WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: adminManage.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: adminManage.php");
        exit(0);
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
?>