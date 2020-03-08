<?php 
include "koneksi.php"; 
$id_kelas = $_POST['id_kelas']; 
$nm_kelas = $_POST['nm_kelas']; 
$tingkat = $_POST['tingkat']; 
$jurusan = $_POST['jurusan']; 
$a="SELECT*FROM kelas WHERE nm_kelas='$nm_kelas' AND tingkat='$tingkat'";
$u=mysqli_query($conn,$a);
$cek=mysqli_num_rows($u);
if ($cek > 0) {
	echo "<script>window.alert('kelas dan jurusan sudah terdaftar')
		window.location='../system/form-kelas.php'</script>";
}else{
	$sql ="INSERT INTO kelas VALUE (null,'$jurusan','$nm_kelas','$tingkat')";
	$query = mysqli_query($conn, $sql) or die ('Sql Error:'.mysql_error());
	echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-kelas.php'</script>";
};
?>