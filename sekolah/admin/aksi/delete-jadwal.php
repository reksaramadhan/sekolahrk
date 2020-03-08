<?php 
include 'koneksi.php';
if (isset($_GET['id_jadwal'])) {
	$delete = mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal = '".$_GET['id_jadwal']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-jadwal.php'</script>";
}
 ?>