<?php
// include database connection file
include 'koneksi.php';

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['edit']))
{   
    $nm_jadwal = $_POST['id_jadwal'];
    $jam=$_POST['jam'];

    // update user data
    $result = mysqli_query($conn, "UPDATE jadwal SET jam='$jam' WHERE id_jadwal=$id_jadwal");
     header('location:../system/form-jadwal.php');
}
?>