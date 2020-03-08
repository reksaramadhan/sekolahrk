<?php  
include 'koneksi.php';
$data_edit = mysqli_query ($conn, "SELECT * FROM jurusan WHERE id_jurusan = '".$_GET['id_jurusan']."'");
$result = mysqli_fetch_array($data_edit);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tabel Jurusan</title>
  </head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.min.css" rel="stylesheet">
    <link href="../asset/css/main.css" rel="stylesheet">
    <link href="../asset/css/util.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../asset/style.css" rel="stylesheet">
  <body>
    <div class="container">
        <div id="main-content" class="col-lg-12">
    <h2 style="text-align: center;">Update Jurusan</h2>
  <form action="aksi-update-jurusan.php" method="POST">
  <table>
    <tr>
      <td><input type="hidden" name="id_jurusan" value="<?php echo $result['id_jurusan']?>"></td>
    </tr>
    <tr>
       <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Jurusan
      </label>
      <input class="form-control" type="text" name="jurusan" value="<?php echo $result['jurusan']?>">
     </div><br>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Keterangan
      </label>
      <input class="form-control" type="text" name="ket" value="<?php echo $result['ket']?>">
     </div></tr><br><br>
    <td>
      <div class="form-group">
      <div>
       <button class="btn btn-primary" type="submit" name="edit" value="Simpan">Simpan</button>
     </div>
     </td>
  </table>
</form>
  <script src="../asset/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>