<?php
	include "koneksi.php";
	$id_kelas = $_POST["id_kelas"];
	$nm_kelas = $_POST["nm_kelas"];
	$tingkat = $_POST["tingkat"];
	// query sql
	$sql = "UPDATE kelas SET nm_kelas='$nm_kelas',tingkat='$tingkat' WHERE id_kelas=$id_kelas";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
	if($query){
		echo "<script>window.alert('data berhasil diupdate')
		window.location='../system/form-kelas.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
?>

