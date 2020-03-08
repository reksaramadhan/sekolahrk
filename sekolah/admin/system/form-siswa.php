<?php  
        include '../aksi/koneksi.php';
        
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
            <h2>Data <b>Siswa</b></h2>
          </div>

         
          <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="POST">
     <div class="form-group ">
      <input class="form-control" type="text" name="pencarian" placeholder="Cari Nama Siswa ...." required>
     </div>
     <div class="form-group" style="margin-left: 5px;">
      <button type="submit" class="btn btn-primary"><i class='fas fa-fw fa-search'></i></button> 
      <div class="form-group" style="margin-left: 10px;">
       <a href="../aksi/upload.php" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Import Table</span></a></div>
       <div class="form-group" style="margin-left: 10px;">
            <a target="_blank" href="../aksi/export-excel-siswa.php" class="btn btn-primary"><i class='fas fa-fw fa-download'></i> <span>Export to Excel</span></a></div>
            <div style="margin-left: 10px;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahsiswa"><i class="fa fa-male"></i> Tambah Siswa</a></div>
            <div class="form-group" style="margin-left: 10px;">
       <a target="_blank" href="cetak1.php" class="btn btn-primary"><i class='fas fa-fw fa-print'></i> <span>Cetak</span></a></div>
     </div>
   </form>
   </div>
   <div class="example-modal">
          <div id="tambahsiswa" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-body">
                  <form action="../aksi/aksi-tambah.php" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group ">
      <input class="form-control" type="hidden" name="id_siswa" placeholder="ID SISWA" required>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Nis
      </label>
      <input class="form-control" type="text" name="nis" placeholder="NIS" required>
     </div>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Nama
      </label>
      <input class="form-control" type="text" name="nama" placeholder="NAMA" required>
     </div>
     <div class="form-group ">
      <label class="control-label " for="message">
       Tanggal Lahir
      </label>
      <input class="control-label" type="date" name="tanggal_lahir" placeholder="TGL LAHIR" required>
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
      </div><br><br>
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
                  <th>No.</th>
                  <th>Foto</th>
                  <th>Nis</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($conn, "SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo "<img src='../aksi/images/".$row['foto']."'width='50' height='50'>";?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tanggal_lahir']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['tingkat']; ?>-<?php echo $row['nm_kelas']; ?></td>
                    <td><?php echo $row['ket']; ?></td>
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" data-toggle="modal" data-target="#updateuser<?php echo $no; ?>"><i class='fas fa-fw fa-edit'></i></a>
                      <a href="#" data-toggle="modal" data-target="#deleteuser<?php echo $no; ?>"><i class='fas fa-fw fa-trash'></i></a>
                      <a href="cetak.php?id_siswa=<?php echo $row['id_siswa'] ?>" ><i class='fas fa-fw fa-print'></i></a>
                                            
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus siswa</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../aksi/delete.php?act=deleteuser&id_siswa=<?php echo $row['id_siswa']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                              <div class="modal-body">
                                <form action="../aksi/aksi-update.php?act=updateuser" method="post" role="form" enctype="multipart/form-data">
                                  <?php
                                  $id_siswa = $row['id_siswa'];
                                  $query = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
                                  $result = mysqli_query($conn, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">NIS</label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nis" placeholder="NIS" value="<?php echo $row['nis']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama</label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggal Lahir</label>
                                      <div class="col-sm-8"><input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $row['tanggal_lahir']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Alamat</label>
                                      <div class="col-sm-8"><input type="textarea" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="file-field">
        <div class="btn btn-primary btn-sm float-left">
          <span>Choose file</span>
          <input type="file" name="foto" placeholder="Upload your file">
        </div>
      </div><br>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                  </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
              </tbody>
            </table>
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
