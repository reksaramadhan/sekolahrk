<?php
	include "koneksi.php";
	$id_user = $_POST["id_user"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$user_role = $_POST["user_role"];
	// query sql
	$sql = "UPDATE user SET username='$username', password='$password' , user_role='$user_role' WHERE id_user=$id_user";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
	if($query){
		echo "<script>window.alert('data berhasil diupdate')
		window.location='../system/form-user.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
?>

