<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahuser'){
$id_siswa = $_POST['id_siswa']; 
$nis = $_POST['nis']; 
$nama = $_POST['nama']; 
$tanggal_lahir = $_POST['tanggal_lahir']; 
$alamat = $_POST['alamat']; 
$nm_kelas = $_POST['nm_kelas'];
$foto = $_FILES['foto']['name']; 
$tmp = $_FILES['foto']['tmp_name']; 
$fotobaru = date('dmYHis').$foto;
$path = "images/".$fotobaru;
move_uploaded_file($tmp, $path);
$a="SELECT*FROM siswa WHERE nis='$nis'";
$u=mysqli_query($conn,$a);
$cek=mysqli_num_rows($u);
if ($cek > 0) {
    echo "<script>window.alert('nis sudah terdaftar')
        window.location='../system/form-siswa.php'</script>";
}else{
    $sql ="INSERT INTO siswa VALUE ('null','$nm_kelas','$nis','$nama','$tanggal_lahir','$alamat','$fotobaru')";
    $query = mysqli_query($conn, $sql) or die ('Sql Error:'.mysql_error());
    echo "<script>window.alert('data berhasil ditambah')
        window.location='../system/form-siswa.php'</script>";
}
}
elseif($_GET['act']=='updateuser'){
    $id_siswa = $_POST["id_siswa"];
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    // query sql
    $sql = "UPDATE siswa SET nis='$nis',nama='$nama',tanggal_lahir='$tanggal_lahir',alamat='$alamat' WHERE id_siswa=$id_siswa";
    $query = mysqli_query($conn, $sql) or die (mysqli_error());
    if($query){
        echo "<script>window.alert('data berhasil diupdate')
        window.location='../system/form-siswa.php'</script>";
    } else {
        echo "Error :".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
    }
}
elseif ($_GET['act'] == 'deleteuser'){
   $delete = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '".$_GET['id_siswa']."'");
    echo "<script>window.alert('data berhasil dihapus')
        window.location='../system/form-siswa.php'</script>";
}
?>