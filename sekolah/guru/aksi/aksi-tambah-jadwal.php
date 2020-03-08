<?php 
include "koneksi.php"; 
$id_jadwal = $_POST['id_jadwal'];  
$jam = $_POST['jam']; 
$a="SELECT*FROM jadwal WHERE jam='$jam'";
$u=mysqli_query($conn,$a);
$cek=mysqli_num_rows($u);
if ($cek > 0) {
	echo "<script>window.alert('jam sedang berlangsung')
		window.location='../system/form-jadwal.php'</script>";
}else{
	$sql ="INSERT INTO kelas VALUE ('null','$jam')";
	$query = mysqli_query($conn, $sql);
	echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-jadwal.php'</script>";
};
?>