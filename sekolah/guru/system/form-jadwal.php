<?php  
        include '../aksi/koneksi.php';
        $no = 1;
        $select = mysqli_query($conn, "SELECT*FROM jadwal INNER JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan JOIN mapel ON jadwal.id_mapel=mapel.id_mapel JOIN guru ON jadwal.id_guru=guru.id_guru");
      ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php  
        include '../template/dashboard.php';
        
      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2>Data <b>Jurusan</b></h2>
          </div>

         
          <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="POST">
     <div class="form-group" style="margin-left: 5px;"> 
      <div class="form-group" style="margin-left: 10px;">
       <a href="upload.php" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Import Table</span></a></div>
       <div class="form-group" style="margin-left: 10px;">
            <a target="_blank" href="../aksi/export-excel-jadwal.php" class="btn btn-primary"><i class='fas fa-fw fa-download'></i> <span>Export to Excel</span></a></div>
            <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahjadwal"><i class="fa fa-male"></i> Tambah Jurusan</a></div>
     </div>
   </form>
   </div>
   <div class="example-modal">
          <div id="tambahjadwal" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <form action="../aksi/aksi-tambah-jadwal.php" method="post" role="form">
                    
                    <div class="form-group ">
      <input class="form-control" type="hidden" name="id_jadwal" placeholder="ID Jadwal" required>
     </div>
     <tr>
      <label>Nama Kelas :</label>
      <?php
      include '../aksi/koneksi.php';
      $sql ="select*from kelas" ;
      $query= mysqli_query($conn,$sql);                                                        
      ?>
       <select class="form-control inputsl" name="nm_kelas">Kelas
        <?php
        while ($data=mysqli_fetch_array($query)) {?>
          <option value="<?=$data['id_kelas']?>"><?=$data['nm_kelas']?>
            (<?php
              if ($data['tingkat']==1) {
                echo "X";
              }
              else if ($data['tingkat']==1) {
                echo "XI";
              }
              else{
                echo "XII";
              }
              ?>)
          </option>";
        <?php  }

        ?>

      </select>
    </tr><br>
    <tr>
       <tr>
      <label>Mata Pelajaran : </label>
      <?php
      include '../aksi/koneksi.php';
      $sql ="select*from mapel" ;
      $query= mysqli_query($conn,$sql);                                                        
      ?>
      <select class="form-control inputsl" name="nm_mapel">Mapel
        <?php
        while ($data=mysqli_fetch_array($query)) {?>
          <option value="<?=$data['id_mapel']?>"><?=$data['kode_mapel']?>
          (<?= $data['nm_mapel']?>)
        </option>";
        <?php  }

        ?>

      </select>
    </tr><br>
    <tr>
       <tr>
      <label>Nama Guru : </label>
      <?php
      include '../aksi/koneksi.php';
      $sql ="select*from guru" ;
      $query= mysqli_query($conn,$sql);                                                        
      ?>
       <select class="form-control inputsl" name="nm_guru">Guru
        <?php
        while ($data=mysqli_fetch_array($query)) {?>
          <option value="<?=$data['id_guru']?>"><?=$data['kode_guru']?>
          (<?= $data['nm_guru']?>)
        </option>";
        <?php  }

        ?>

      </select>
    </tr><br>
    <tr>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Jam Ke :
      </label>
      <input class="form-control" type="text" name="jam" placeholder="JAM" required>
     </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                    <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
                        <th>No</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Jurusan</th>
                            <th>Jumlah Jam</th>
                            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$hasil['nm_kelas']."</td>";
            echo "<td>".$hasil['nm_mapel']."</td>"; 
            echo "<td>".$hasil['nm_guru']."</td>";
            echo "<td>".$hasil['jurusan']."</td>"; 
            echo "<td>".$hasil['jam']."</td>"; 
            echo "<td><a href='../aksi/update-jadwal.php?id_jadwal=$hasil[id_jadwal]'><i class='fas fa-fw fa-edit'></i></a> | <a href='../aksi/delete-jadwal.php?id_jadwal=$hasil[id_jadwal]'><i class='fas fa-fw fa-trash'></i></a></td></tr>";
            echo "</td>";
            echo "</tr>";
      
        }
        ?>
    </tbody>
    </table>
  </div>
</div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="../asset/vendor/jquery/jquery.min.js"></script>
  <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../asset/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../asset/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../asset/js/demo/chart-area-demo.js"></script>
  <script src="../asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>
