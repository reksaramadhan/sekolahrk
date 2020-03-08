<?php  
        include '../aksi/koneksi.php';
        $no = 1;
        $select = mysqli_query($conn, "SELECT*FROM user");
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
            <h2>Data <b>User</b></h2>
          </div>

         
          <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="POST">
     <div class="form-group" style="margin-left: 5px;"> 
      <div class="form-group" style="margin-left: 10px;">
       <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import"><i class="fa fa-male"></i> Import Tabel</a></div>
       <div class="form-group" style="margin-left: 10px;">
            <a target="_blank" href="../aksi/export-excel-user.php" class="btn btn-primary"><i class='fas fa-fw fa-download'></i> <span>Export to Excel</span></a></div>
            <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahjurusan"><i class="fa fa-male"></i> Tambah User</a></div>
     </div>
   </form>
   </div>
   <div class="example-modal">
          <div id="tambahjurusan" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <form action="../aksi/aksi-tambah-user.php" method="post" role="form">
                    
                    <div class="form-group ">
      <input class="form-control" type="hidden" name="id_user" placeholder="ID Jurusan" required>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Username
      </label>
      <input class="form-control" type="text" name="username" placeholder="Username" required>
     </div>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Password
      </label>
      <input class="form-control" type="text" name="password" placeholder="Password" required>
     </div>
     <tr>
      <label>Level : </label>
     <select class="form-control inputsl" name="user_role">
        <option selected>Level</option>
        <option value="admin">Admin</option>
        <option value="siswa">Siswa</option>
        <option value="guru">Guru</option>
        <option value="wali_kelas">Wali Kelas</option>
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
        <div class="example-modal">
          <div id="import" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <h3>Import Tabel</h3><br>
                  <table style="margin-left: 180px;">
<form method="post" enctype="multipart/form-data" action="../aksi/upload_aksi-user.php">
  Pilih File: 
  <input name="fileuser" type="file" required="required"> 
  <input name="upload" type="submit" value="Import">
  <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary">
                    </div>
</form>
</table>
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
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Level</th>
          <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td data-header='no'>".$no++."</td>";
            echo "<td data-header='username'>".$hasil['username']."</td>";
            echo "<td data-header='password'>".$hasil['password']."</td>";
            echo "<td data-header='level'>".$hasil['user_role']."</td>";
            echo "<td data-header='aksi'><a href='../aksi/update-user.php?id_user=$hasil[id_user]'><i class='fas fa-fw fa-edit'></i></a> | <a href='../aksi/delete-user.php?id_user=$hasil[id_user]'><i class='fas fa-fw fa-trash'></i></a></td></tr>";  
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
