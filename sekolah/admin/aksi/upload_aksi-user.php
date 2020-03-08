
<?php 
include 'koneksi.php';
include "excel_reader2.php";
?>

<?php
$target = basename($_FILES['fileuser']['name']) ;
move_uploaded_file($_FILES['fileuser']['tmp_name'], $target);

chmod($_FILES['fileuser']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['fileuser']['name'],false);
$jumlah_baris = $data->rowcount($sheet_index=0);
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	$username  = $data->val($i, 1);
	$password  = $data->val($i, 2);
	$user_role  = $data->val($i, 3);
	

	if( $username != "" && $password != "" && $user_role != "" ){
	
		mysqli_query($conn,"INSERT into user VALUES ('null','$username','$password','$user_role')") or die(mysqli_error($conn));
		$berhasil++;
	}
	
}


unlink($_FILES['fileuser']['name']);


header("location:../system/form-user.php?berhasil=$berhasil");
?>