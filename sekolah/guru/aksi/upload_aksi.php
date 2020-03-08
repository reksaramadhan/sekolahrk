
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

	
	$foto  = $data->val($i, 2);
	$nis  = $data->val($i, 3);
	$nama  = $data->val($i, 4);
	$tanggal_lahir  = $data->val($i, 5);
	$alamat  = $data->val($i, 6);
	

	if( $foto != "" && $nis != "" && $nama != "" && $tanggal_lahir != "" && $alamat != "" ){
	
		mysqli_query($koneksi,"INSERT into siswa values('','$id_siswa','$nis','$nama','$tanggal_lahir','$alamat','$foto')");
		$berhasil++;
	}
}


unlink($_FILES['filesiswa']['name']);


header("location:form-siswa.php?berhasil=$berhasil");
?>