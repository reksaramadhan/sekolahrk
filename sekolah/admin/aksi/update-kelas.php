<?php  
include 'koneksi.php';
$data_edit = mysqli_query ($conn, "SELECT * FROM kelas WHERE id_kelas = '".$_GET['id_kelas']."'");
$result = mysqli_fetch_array($data_edit);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tabel Kelas</title>
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
    <h2 style="text-align: center;">Update Kelas</h2>
  <form action="aksi-update-kelas.php" method="POST">
  <table>
    <tr>
      <td><input type="hidden" name="id_kelas" value="<?php echo $result['id_kelas']?>"></td>
    </tr>
    <tr>
       <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Nama Kelas
      </label>
      <input class="form-control" type="text" name="nm_kelas" value="<?php echo $result['nm_kelas']?>">
     </div>
   </tr><br>
    <tr>
      <label>Tingkat : </label>
     <select class="form-control inputsl" name="tingkat" value="<?php echo $result['tingkat']?>">
        <option selected>Tingkat</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
    </tr><br><br>
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