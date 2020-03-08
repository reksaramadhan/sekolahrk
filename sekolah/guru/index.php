<?php
  include '/aksi/koneksi.php';

$kueri = mysqli_query($conn, "SELECT * FROM siswa");
 
  $data = array ();
  while (($row = mysqli_fetch_array($kueri)) != null){
    $data[] = $row;
  }
    $cont = count ($data);
    $jml = "".$cont;

    $kueri2 = mysqli_query($conn, "SELECT * FROM kelas");
 
  $data2 = array ();
  while (($row = mysqli_fetch_array($kueri2)) != null){
    $data2[] = $row;
  }
    $cont2 = count ($data2);
    $jml2 = "".$cont2;


  $kueri3 = mysqli_query($conn, "SELECT * FROM jurusan");
 
  $data3 = array ();
  while (($row = mysqli_fetch_array($kueri3)) != null){
    $data3[] = $row;
  }
    $cont3 = count ($data3);
    $jml3 = "".$cont3; 

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    session_start();
  /*echo $_SESSION['level'];
  echo $_SESSION['nama'];*/
  if (! isset ($_SESSION['username'])) {
    header("location:../index.php");
  }
 ?>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sekolah</title>

  <!-- Custom fonts for this template-->
  <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="asset/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                  <span class="hidden-xs">Welcome <b><?php echo $_SESSION['username']?></b></span>
                </a>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sekolah</div>
      </a>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mapel" aria-expanded="true" aria-controls="mapel">
          <i class="fas fa-fw fa-folder"></i>
          <span>Mata Pelajaran</span>
        </a>
        <div id="mapel" class="collapse" aria-labelledby="mapel" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="system/form-mapel.php">View Mata Pelajaran</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#guru" aria-expanded="true" aria-controls="guru">
          <i class="fas fa-fw fa-folder"></i>
          <span>Guru</span>
        </a>
        <div id="guru" class="collapse" aria-labelledby="guru" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="system/form-guru.php">View Guru</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jadwal" aria-expanded="true" aria-controls="jadwal">
          <i class="fas fa-fw fa-folder"></i>
          <span>Jadwal</span>
        </a>
        <div id="jadwal" class="collapse" aria-labelledby="jadwal" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="system/form-jadwal.php">View Jadwal</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
          <i class="fas fa-fw fa-folder"></i>
          <span>LogOut</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="user" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../logout.php">LogOut</a>
          </div>
        </div>
      </li>

      </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <main>
      <div class="row container">
        <div class="col s12">
          <!--content user-->
          <div class="col s12 l6">
                    <div class="card blue-grey lighten-5">
                        <div class="card-content red-text text-darken-2">
                          <span class="card-title">Siswa
                              <i class="medium material-icons left">supervisor_account</i>
                              <p class="right"><?php echo $jml; ?></p>
                          </span>
                        </div>
                        
                        <div class="card-action">
                          <i class="material-icons left red-text text-darken-2">visibility</i>
                          <a href="system/form-siswa.php" class="red-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>

                  <!--content barang masuk-->
          <div class="col s12 l6">
                    <div class="card blue-grey lighten-5">
                        <div class="card-content red-text text-darken-2">
                          <span class="card-title">Kelas
                              <i class="medium material-icons left">archive</i>
                              <p class="right"><?php echo $jml2; ?></p>
                          </span>
                        </div>
                        
                        <div class="card-action">
                          <i class="material-icons left red-text text-darken-2">visibility</i>
                          <a href="system/form-kelas.php" class="red-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>


                  
          <div class="col s12 l6">
                    <div class="card blue-grey lighten-5">
                        <div class="card-content red-text text-darken-2">
                          <span class="card-title">Jurusan
                              <i class="medium material-icons left">unarchive</i>
                              <p class="right"><?php echo $jml3; ?></p>
                          </span>
                        </div>
                        
                        <div class="card-action">
                          <i class="material-icons left red-text text-darken-2">visibility</i>
                          <a href="system/form-jurusan.php" class="red-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>

        </div>
      </div>
    </main>

  <!-- Bootstrap core JavaScript-->
  <script src="asset/vendor/jquery/jquery.min.js"></script>
  <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="asset/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="asset/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="asset/js/demo/chart-area-demo.js"></script>
  <script src="asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>
