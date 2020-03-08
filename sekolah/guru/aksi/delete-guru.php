<?php 
include 'koneksi.php';
if (isset($_GET['id_guru'])) {
	$delete = mysqli_query($conn, "DELETE FROM guru WHERE id_guru = '".$_GET['id_guru']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-guru.php'</script>";
}
 ?>