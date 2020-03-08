<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.min.css" rel="stylesheet">
    <link href="../asset/css/main.css" rel="stylesheet">
    <link href="../asset/css/util.css" rel="stylesheet">
<body>

<button><a href="form-siswa.php">Kembali</a></button>
<br/><br/>
<?php 
include 'koneksi.php';
?>
<table style="margin-left: 180px;">
<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	Pilih File: 
	<input name="filesiswa" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>
</table>
<br/><br/>

</body>
</html>