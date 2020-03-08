<?php
	include "koneksi.php";
	$id_jurusan = $_POST["id_jurusan"];
	$jurusan = $_POST["jurusan"];
	$ket = $_POST["ket"];
	// query sql
	$sql = "UPDATE jurusan SET jurusan='$jurusan', ket='$ket' WHERE id_jurusan=$id_jurusan";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
	if($query){
		echo "<script>window.alert('data berhasil diupdate')
		window.location='../system/form-jurusan.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
?>

