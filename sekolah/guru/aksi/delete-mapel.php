<?php 
include 'koneksi.php';
if (isset($_GET['id_mapel'])) {
	$delete = mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel = '".$_GET['id_mapel']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-kelas.php'</script>";
}
 ?>