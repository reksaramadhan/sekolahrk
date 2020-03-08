<?php  
include 'koneksi.php';
$data_edit = mysqli_query ($conn, "SELECT * FROM mapel WHERE id_mapel = '".$_GET['id_mapel']."'");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../asset/style.css" rel="stylesheet">
  <body>
    <body>
    <div class="container">
        <div id="main-content" class="col-lg-12" style="padding-left: 300px;">
    <h4 style="text-align: left;">Update Mata Pelajaran</h4>
  <div class="bootstrap-wrap">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="md-form" action="aksi-update-mapel.php" method="POST">
     <div class="form-group ">
      <input class="form-control" type="hidden" name="id_mapel" value="<?php echo $result['id_mapel']?>">
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="kode_mapel">
       Kode Mata Pelajaran
      </label>
      <input class="form-control" type="text" name="kode_mapel" value="<?php echo $result['kode_mapel']?>">
     </div>
     <div class="form-group ">
      <label class="control-label " for="nm_mapel">
       Nama Mata Pelajaran
      </label>
      <input class="form-control" type="text" name="nm_mapel" value="<?php echo $result['nm_mapel']?>">
     </div>
     <div>
       <button class="btn btn-primary " type="submit" name="edit" value="Simpan">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
  <script src="../asset/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>