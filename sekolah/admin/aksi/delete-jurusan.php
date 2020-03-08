<?php 
include 'koneksi.php';
if (isset($_GET['id_jurusan'])) {
	$delete = mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan = '".$_GET['id_jurusan']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-jurusan.php'</script>";
}
 ?>