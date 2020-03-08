<?php 
include "koneksi.php"; 
$id_user = $_POST['id_user']; 
$username = $_POST['username']; 
$password = $_POST['password'];  
$user_role = $_POST['user_role'];  
$a="SELECT*FROM user WHERE username='$username'";
$u=mysqli_query($conn,$a);
$cek=mysqli_num_rows($u);
if ($cek > 0) {
	echo "<script>window.alert('user sudah terdaftar')
		window.location='../system/form-user.php'</script>";
}else{
	$sql ="INSERT INTO user VALUE ('null','$username','$password','$user_role')";
	$query = mysqli_query($conn, $sql) or die ('Sql Error:'.mysql_error());
	echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-user.php'</script>";
		};
?>