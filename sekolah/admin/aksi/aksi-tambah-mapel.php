<?php
	include "koneksi.php";
	$id_mapel = $_POST["id_mapel"];
	$kode_mapel = $_POST["kode_mapel"];
	$nm_mapel = $_POST["nm_mapel"];
	// query sql
	$sql = "INSERT INTO mapel (id_mapel, kode_mapel, nm_mapel) VALUES('$id_mapel','$kode_mapel','$nm_mapel')";
	$query = mysqli_query($conn, $sql) or die (mysqli_error());
	if($query){
		echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-mapel.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
?>