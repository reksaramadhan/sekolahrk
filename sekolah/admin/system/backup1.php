<?php  
				include 'koneksi.php';
				$no = 1;
				$select = mysqli_query($conn, "SELECT*FROM siswa");
			?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tabel Siswa</title>

    <!-- Bootstrap -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../asset/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div id="header">
        <h1>Sekolah</h1>
      </div>
    </div>
    <div class="container">
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="form-tambah-siswa.php">Tambah Siswa</a></li>
        <li><a href="form-tambah-kelas.php">Tambah Kelas</a></li>
        <li><a href="form-jurusan.php">Tambah Jurusan</a></li>
        <li><a href="../index.php">LogOut</a></li>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </div>
    <div class="container">
        <div id="main-content" class="col-lg-12">
          <h2 style="text-align: center;">Tambah Data Siswa</h2>
  <form action="aksi-tambah.php" method="POST">
  <table>
    <tr>
      <td><input type="hidden" name="id_siswa" placeholder="ID SISWA" required></td>
    </tr>
    <tr>
      <td>NIS</td>
      <td>:</td>
      <td><input type="text" name="nis" placeholder="NIS" required></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><input type="text" name="nama" placeholder="NAMA" required></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td>:</td>
      <td><input type="date" name="tanggal_lahir" placeholder="TGL LAHIR" required></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><input type="text" name="alamat" placeholder="ALAMAT" required></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><button class="btn btn-success" type="submit" name="simpan" value="Simpan">Simpan</button></td>
    </tr>
  </table>
</form><br>

  <table border="1" cellspacing="0" width="100%">
    <tr style="text-align: center; font-weight: bold; background-color: #eee">
      <td>No</td>
      <td>ID Siswa</td>
      <td>NIS</td>
      <td>Nama</td>
      <td>Tanggal Lahir</td>
      <td>Alamat</td>
      <td>Opsi</td>
    </tr>
      
    <?php  
    while($hasil = mysqli_fetch_array($select)) {         
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$hasil['id_siswa']."</td>";
        echo "<td>".$hasil['nis']."</td>";
        echo "<td>".$hasil['nama']."</td>"; 
        echo "<td>".$hasil['tanggal_lahir']."</td>";
        echo "<td>".$hasil['alamat']."</td>";  
        echo "<td><a href=update.php?id_siswa=$hasil[id_siswa]>Update</a> | <a href=delete.php?id_siswa=$hasil[id_siswa]>Delete</a></td></tr>";        
    }
    ?>
  </table>
    </div>
  <script src="../asset/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>













<?php 
include 'koneksi.php';
if (isset($_POST['simpan'])) {

$insert = mysqli_query($conn, "INSERT INTO siswa VALUES
	('".$_POST['id_siswa']."',
	 '".$_POST['nis']."',
	 '".$_POST['nama']."',
	 '".$_POST['tanggal_lahir']."',
	 '".$_POST['alamat']."')");
	if ($insert) {
		header('location:form-tambah-siswa.php');
	}else{
		echo 'gagal disimpan';
	}
}
?>






<?php
include "koneksi.php";

if(isset($_POST['edit'])){
$id_siswa = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$fotobaru = date('dmYHis').$foto;
$path = "images/".$fotobaru;
if(move_uploaded_file($tmp, $path)){ 
  $query = "SELECT * FROM siswa WHERE id_siswa='".$id_siswa."'";
$sql = mysqli_query($conn, $query); 
$data = mysqli_fetch_array($sql); 
if(is_file("images/".$data['foto'])) 
unlink("images/".$data['foto']); 
$query = "UPDATE siswa SET nis='".$nis."', nama='".$nama."', tanggal_lahir='".$tanggal_lahir."', alamat='".$alamat."', foto='".$fotobaru."' WHERE id_siswa='".$id_siswa."'";
$sql = mysqli_query($conn, $query); 
if($sql){
echo "<script>window.alert('data berhasil diupdate')
    window.location='form-siswa.php'</script>"; 
}else{
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
}else{
echo "Maaf, Gambar gagal untuk diupload.";
echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
}else{ 
$query = "UPDATE siswa SET nis='".$nis."', nama='".$nama."', tanggal_lahir='".$tanggal_lahir."', alamat='".$alamat."', foto='".$fotobaru."' WHERE id_siswa='".$id_siswa."'";
$sql = mysqli_query($conn, $query);
if($sql){
header("location: form-siswa.php"); 
}else{
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
}


