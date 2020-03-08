<?php 
include "koneksi.php";
if (isset($_POST['simpan'])) 
$id_guru = $_POST['id_guru']; 
$kode_guru = $_POST['kode_guru']; 
$nm_guru = $_POST['nm_guru'];  
$alamat = $_POST['alamat']; 
$kode_mapel = $_POST['kode_mapel']; 
$foto = $_FILES['foto']['name']; 
$tmp = $_FILES['foto']['tmp_name']; 
$fotobaru = date('dmYHis').$foto;
$path = "images/".$fotobaru; 
if(move_uploaded_file($tmp, $path)){ 
	$query = "INSERT INTO guru VALUES(null, '".$kode_mapel."', '".$kode_guru."', '".$nm_guru."', '".$alamat."', '".$fotobaru."')"; $sql = mysqli_query($conn, $query); 
	if($sql){ 
		echo "<script>window.alert('data berhasil ditambah')
		window.location='../system/form-guru.php'</script>"; 
	}else{ 
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database."; echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>"; } 
	}else{ 
			echo "Maaf, Gambar gagal untuk diupload."; echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>"; } ?>