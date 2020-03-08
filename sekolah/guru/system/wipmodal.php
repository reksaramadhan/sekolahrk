<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
         
          <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah User</a>
          
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
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
                    <td><?php echo "<img src='images/".$row['foto']."'width='50' height='50'>";?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tanggal_lahir']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['tingkat']; ?></td>
                    <td><?php echo $row['ket']; ?></td>
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" data-toggle="modal" data-target="#updateuser<?php echo $no; ?>"><i class='fas fa-fw fa-edit'></i></a>
                      <a href="#" data-toggle="modal" data-target="#deleteuser<?php echo $no; ?>"><i class='fas fa-fw fa-trash'></i></a>                      
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data Siswa</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus siswa id <?php echo $row['id_siswa'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../user/function_user.php?act=deleteuser&id=<?php echo $row['id_siswa']; ?>" class="btn btn-primary">Delete</a>
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Siswa</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../user/function_user.php?act=updateuser" method="post" role="form">
                                  <?php
                                  $id_siswa = $row['id_siswa'];
                                  $query = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
                                  $result = mysqli_query($conn, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">NIS <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nis" placeholder="NIS" value="<?php echo $row['nis']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggal Lahir <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $row['tanggal_lahir']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Alamat <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="textarea" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>"></div>
                                    </div>
                                  </div>
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

        <!-- modal insert -->
        <div class="example-modal">
          <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Registrasi Siswa Baru</h3>
                </div>
                <div class="modal-body">
                  <form action="../user/function_user.php?act=tambahuser" method="post" role="form">
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">NIS <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="nis" placeholder="NIS" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Tanggal Lahir <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal LAhir" value=""></div>
                      </div>
                    </div>
                      <tr>
                      <label>Nama Kelas :</label>
                      <?php
                      include 'koneksi.php';
                      $sql ="select*from kelas" ;
                      $query= mysqli_query($conn,$sql);?>
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
                        <?php  } ?>
                      </select>
                        </tr>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Alamat <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="date" class="form-control" name="alamat" placeholder="Alamat" value=""></div>
                      </div>
                    </div>
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                          <input type="file" name="foto" placeholder="Upload your file">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
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
        </div><!-- modal insert close -->
      </div>
    </div>
  </div>
</section><!-- /.content -->






<!-- Ini Fitur PAgging -->

<thead>
        <tr>
                        <th scope="col">No</th>
                            
                            <th scope="col">Foto</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $batas = 5;
        $hal = @$_GET['hal'];
        if(empty($hal)){
          $posisi = 0;
          $hal = 1;
        }else{
          $posisi =($hal - 1)* $batas;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
          if ($pencarian !='') {
            $sql = ("SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama LIKE '%$pencarian%'");
            $query = $sql;
            $queryJml = $sql;
          } else {
            $query = ("SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan LIMIT $posisi, $batas");
            $queryJml = "SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan";
            $no = $posisi + 1;
          }
        } else {
            $query = ("SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan LIMIT $posisi, $batas");
            $queryJml = "SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan";
            $no = $posisi + 1;
        }

        $no = 1;
        $select = mysqli_query($conn, $query) or die (mysqli_error($conn));
        if (mysqli_num_rows($select) > 0) {
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td data-header='no'>".$no++."</td>";
            echo "<td data-header='foto'><img src='../aksi/images/".$hasil['foto']."'width='50' height='50'></td>";
            echo "<td data-header='nis'>".$hasil['nis']."</td>";
            echo "<td data-header='nama'>".$hasil['nama']."</td>"; 
            echo "<td data-header='tanggal_lahir'>".$hasil['tanggal_lahir']."</td>";
            echo "<td data-header='alamat'>".$hasil['alamat']."</td>";
            echo "<td data-header='nm_kelas'>".$hasil['tingkat']."-".$hasil['nm_kelas']."</td>";
            echo "<td data-header='jurusan'>".$hasil['ket']."</td>";
            echo "<td data-header='aksi'><a href='../aksi/update.php?id_siswa=$hasil[id_siswa]'><i class='fas fa-fw fa-edit'></i></a> | <a href='../aksi/delete.php?id_siswa=$hasil[id_siswa]'><i class='fas fa-fw fa-trash'></i></a></td></tr>";
            echo "</td>";
            echo "</tr>";

        } 
        }else
          echo "<tr><td colspan=\"10\" align=\"center\">Data Tidak Ditemukan</td></tr>";
        ?>

    </tbody>
    </table>
  </div>
   <?php
   if (isset($_POST['pencarian']) != '') {
     echo "<div style=\"float:\">";
     $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
     echo "Data Hasil Pencarian : <b>$jml</b>";
     echo "</div>";
   }else{ ?>
      <div style="float:left;">
        <?php
        $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
        echo "Jumlah Data Siswa : <b>$jml</b>";
        ?>
      </div>
      <div style="float:right;">
        <ul class="pagination pagination-circle pg-blue" style="margin: 0">
          <?php
          $jml_hal = ceil ($jml/$batas);
          for ($i=1; $i <= $jml_hal; $i++){
            if ($i != $hal) {
              echo "<li class :'page-item'><a href=\"?hal=$i\">$i</a></li>";
            } else {
              echo "<li class='active'>$i</a></li>";
            }
          }
          ?>
        </ul>
      </div>
        <?php
   }
   ?>
  </div>