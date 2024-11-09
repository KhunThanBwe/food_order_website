<?php
session_start();
include('../config/db.php');

// Get the id of admin to be delete
$id = $_GET['delete_id'];

// Create query to be delete admin
$result = mysqli_query($conn, "DELETE FROM tbl_admin WHERE id=$id");

// Check whether query deleted successfully ro not
if($result) {

    // session message
    $_SESSION['delete'] = 'Admin deleted successfully';

    //redricet Page
    header('location:manage-admin.php');

}else {

    // Admin can not delete output
    $_SESSION['delete'] = "Admin delete Failed, Try again.";
    
    //redricet Page
    header('location:manage-admin.php');
}



?>