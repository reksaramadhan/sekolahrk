<?php 
include 'koneksi.php';
if (isset($_GET['id_user'])) {
	$delete = mysqli_query($conn, "DELETE FROM user WHERE id_user = '".$_GET['id_user']."'");
	echo "<script>window.alert('data berhasil dihapus')
		window.location='../system/form-user.php'</script>";
}
 ?>