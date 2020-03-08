
<?php 
include 'koneksi.php';
include "excel_reader2.php";
?>

<?php
$target = basename($_FILES['filesiswa']['name']) ;
move_uploaded_file($_FILES['filesiswa']['tmp_name'], $target);

chmod($_FILES['filesiswa']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['filesiswa']['name'],false);
$jumlah_baris = $data->rowcount($sheet_index=0);

$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	$nis  = $data->val($i, 1);
	$nama  = $data->val($i, 2);
	$tanggal_lahir  = $data->val($i, 3);
	$alamat  = $data->val($i, 4);
	

	if( $nis != "" && $nama != "" && $tanggal_lahir != "" && $alamat != "" ){
	
		mysqli_query($conn,"INSERT into siswa values('$nis','$nama','$tanggal_lahir','$alamat')");
		$berhasil++;
	}
}


unlink($_FILES['filesiswa']['name']);


header("location:../system/form-siswa.php?berhasil=$berhasil");
?>