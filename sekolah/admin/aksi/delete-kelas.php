<?php 
include 'koneksi.php';
if (isset($_GET['id_kelas'])) {
	$delete = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '".$_GET['id_kelas']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-kelas.php'</script>";
}
 ?>