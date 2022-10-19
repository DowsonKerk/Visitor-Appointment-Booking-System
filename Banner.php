<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_banner']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_banner']);

    $query = "DELETE FROM banner WHERE product_id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Banner Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Banner Not Deleted";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_banner']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_offer = mysqli_real_escape_string($con, $_POST['product_offer']);
    $product_date_start = mysqli_real_escape_string($con, $_POST['product_date_start']);
    $product_date_end = mysqli_real_escape_string($con, $_POST['product_date_end']);

    $query ="UPDATE banner SET product_name='$product_name', product_description='$product_description', product_price='$product_price', product_offer='$product_offer' , product_date_start='$product_date_start' , product_date_end='$product_date_end'  WHERE product_id='$product_id' ";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Banner Created Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Banner Not Created";
        header("Location: admin.php");
        exit(0);
    }

}


if(isset($_POST['add_banner']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_offer = mysqli_real_escape_string($con, $_POST['product_offer']);
    $product_date_start = mysqli_real_escape_string($con, $_POST['product_date_start']);
    $product_date_end = mysqli_real_escape_string($con, $_POST['product_date_end']);

    $query = "INSERT INTO banner (product_id,product_name,product_description,product_price,product_offer,product_date_start,product_date_end) VALUES ('$product_id','$product_name','$product_description','$product_price','$product_offer','$product_date_start','$product_date_end')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Banner Created Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Banner Not Created";
        header("Location: admin.php");
        exit(0);
    }
}

?>