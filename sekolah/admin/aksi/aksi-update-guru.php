<?php
	include "koneksi.php";
	$id_guru = $_POST["id_guru"];
	$kode_guru = $_POST["kode_guru"];
	$nm_guru = $_POST["nm_guru"];
	$alamat = $_POST["alamat"];
	// query sql
	$sql = "UPDATE guru SET kode_guru='$kode_guru',nm_guru='$nm_guru',alamat='$alamat' WHERE id_guru=$id_guru";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
	if($query){
		echo "<script>window.alert('data berhasil diupdate')
		window.location='../system/form-guru.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
?>
