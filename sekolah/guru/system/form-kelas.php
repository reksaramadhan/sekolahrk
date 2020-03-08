<?php  
        include '../aksi/koneksi.php';
        $no = 1;
        $select = mysqli_query($conn, "SELECT*FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
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
            <h2>Data <b>Kelas</b></h2>
          </div>

         
          <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="POST">
     <div class="form-group" style="margin-left: 5px;"> 
      <div class="form-group" style="margin-left: 10px;">
       <a href="upload.php" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Import Table</span></a></div>
       <div class="form-group" style="margin-left: 10px;">
            <a target="_blank" href="../aksi/export-excel-kelas.php" class="btn btn-primary"><i class='fas fa-fw fa-download'></i> <span>Export to Excel</span></a></div>
            <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahkelas"><i class="fa fa-male"></i> Tambah Kelas</a></div>
     </div>
   </form>
   </div>
   <div class="example-modal">
          <div id="tambahkelas" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <form action="../aksi/aksi-tambah-kelas.php" method="post" role="form">
                    
                    <div class="form-group ">
      <input class="form-control" type="hidden" name="id_kelas" placeholder="ID KELAS" required>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Nama Kelas
      </label>
      <input class="form-control" type="text" name="nm_kelas" placeholder="Nama Kelas" required>
     </div>
   </tr>
    <tr>
      <label>Jurusan : </label>
      <?php
      include '../aksi/koneksi.php';
      $sql ="select*from jurusan" ;
      $query= mysqli_query($conn,$sql);                                                        
      ?>
      <select class="form-control inputsl" name="jurusan">jurusan
        <?php
        while ($data=mysqli_fetch_array($query)) {?>
          <option value="<?=$data['id_jurusan']?>"><?=$data['jurusan']?>
          (<?= $data['ket']?>)
        </option>";
        <?php  }

        ?>

      </select>
    </tr>
    <br>
    <tr>
      <label>Tingkat : </label>
     <select class="form-control inputsl" name="tingkat">
        <option selected>Tingkat</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
    </tr>
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
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td data-header='no'>".$no++."</td>";
            echo "<td data-header='nama kelas'>".$hasil['nm_kelas']."</td>";
            echo "<td data-header='tingkat'>".$hasil['tingkat']."</td>";
            echo "<td data-header='ket'>".$hasil['ket']."</td>";
            echo "<td data-header='aksi'><a href='../aksi/update-kelas.php?id_kelas=$hasil[id_kelas]'><i class='fas fa-fw fa-edit'></i></a> | <a href='../aksi/delete-kelas.php?id_kelas=$hasil[id_kelas]'><i class='fas fa-fw fa-trash'></i></a></td></tr>";  
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
