<?php  
        include '../aksi/koneksi.php';
        $no = 1;
        $select = mysqli_query($conn, "SELECT*FROM guru inner join mapel on mapel.id_mapel=guru.id_mapel");
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
            <a target="_blank" href="../aksi/export-excel-guru.php" class="btn btn-primary"><i class='fas fa-fw fa-download'></i> <span>Export to Excel</span></a></div>
            <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahguru"><i class="fa fa-male"></i> Tambah Guru</a></div>
     </div>
   </form>
   </div>
   <div class="example-modal">
          <div id="tambahguru" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <form action="../aksi/aksi-tambah-guru.php" method="post" role="form" enctype="multipart/form-data">
                    
                    <div class="form-group ">
      <input class="form-control" type="hidden" name="id_guru" placeholder="ID guru" required>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Kode Guru
      </label>
      <input class="form-control" type="text" name="kode_guru" placeholder="KODE GURU" required>
     </div>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Nama Guru
      </label>
      <input class="form-control" type="text" name="nm_guru" placeholder="NAMA GURU" required>
     </div>
     <tr>
      <label>Jurusan : </label>
      <?php
      include '../aksi/koneksi.php';
      $sql ="select*from mapel" ;
      $query= mysqli_query($conn,$sql);                                                        
      ?>
      <select class="form-control inputsl" name="kode_mapel">jurusan
        <?php
        while ($data=mysqli_fetch_array($query)) {?>
          <option value="<?=$data['id_mapel']?>"><?=$data['kode_mapel']?>
          (<?= $data['kode_mapel']?>)
        </option>";
        <?php  }

        ?>

      </select>
    </tr>
     <div class="form-group ">
      <label class="control-label " for="message">
       Alamat
      </label>
      <textarea class="form-control" cols="40" name="alamat" placeholder="ALAMAT" required rows="10"></textarea>
     </div>
     <div class="file-field">
        <div class="btn btn-primary btn-sm float-left">
          <span>Choose file</span>
          <input type="file" name="foto" placeholder="Upload your file">
        </div>
      </div><br>
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
                        <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Kode Guru</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td data-header='no'>".$no++."</td>";
            echo "<td data-header='foto'><img src='../aksi/images/".$hasil['foto']."'width='50' height='50'></td>";
            echo "<td data-header='kode guru'>".$hasil['kode_guru']."</td>";
            echo "<td data-header='nama guru'>".$hasil['nm_guru']."</td>"; 
            echo "<td data-header='alamat'>".$hasil['alamat']."</td>";
            echo "<td data-header='aksi'><a href='../aksi/update-guru.php?id_guru=$hasil[id_guru]'><i class='fas fa-fw fa-edit'></i></a> | <a href='../aksi/delete-guru.php?id_guru=$hasil[id_guru]'><i class='fas fa-fw fa-trash'></i></td></tr>"; 
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
