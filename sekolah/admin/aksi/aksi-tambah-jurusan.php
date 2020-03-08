<?php 
include "koneksi.php"; 
$id_jurusan = $_POST['id_jurusan']; 
$jurusan = $_POST['jurusan']; 
$ket = $_POST['ket'];  
$a="SELECT*FROM jurusan WHERE jurusan='$jurusan'";
$u=mysqli_query($conn,$a);
$cek=mysqli_num_rows($u);
if ($cek > 0) {
	echo "<script>window.alert('jurusan sudah terdaftar')
		window.location='../system/form-jurusan.php'</script>";
}else{
	$sql ="INSERT INTO jurusan VALUE ('null','$jurusan','$ket')";
	$query = mysqli_query($conn, $sql) or die ('Sql Error:'.mysql_error());
	echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-jurusan.php'</script>";
		};
?>