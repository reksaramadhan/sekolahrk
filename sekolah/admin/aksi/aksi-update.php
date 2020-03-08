<?php

	include "koneksi.php";
	if($_GET['act']=='updateuser'){
	$id_siswa = $_POST["id_siswa"];
	$nis = $_POST["nis"];
	$nama = $_POST["nama"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];
	$foto = $_FILES['foto']['name']; 
$tmp = $_FILES['foto']['tmp_name']; 
$path = "images/".$foto;
move_uploaded_file($tmp, $path);
	// query sql
	$sql = "UPDATE siswa SET nis='$nis',nama='$nama',tanggal_lahir='$tanggal_lahir',alamat='$alamat',foto='$foto' WHERE id_siswa=$id_siswa";
	$query = mysqli_query($conn, $sql) ;
	if($query){
		echo "<script>window.alert('data berhasil diupdate')
		window.location='../system/form-siswa.php'</script>";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
	}
?>
