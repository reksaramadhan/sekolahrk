<?php 
include 'koneksi.php';
if ($_GET['act'] == 'deleteuser'){
	$delete = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '".$_GET['id_siswa']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-siswa.php'</script>";
}
 ?>