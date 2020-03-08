<?php  
				include 'koneksi.php';
				$no = 1;
				$select = mysqli_query($conn, "SELECT*FROM mapel");
			?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=mapel.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table class="table table-striped">
    <thead>
        <tr>
      <td>No</td>
      <td>ID Mata Pelajaran</td>
      <td>Kode Mata Pelajaran</td>
      <td>Nama Mata Pelajaran</td>
    </tr>
      </thead>
    <tbody>
    <?php  
    while($hasil = mysqli_fetch_array($select)) {         
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$hasil['id_mapel']."</td>";
        echo "<td>".$hasil['kode_mapel']."</td>";
        echo "<td>".$hasil['nm_mapel']."</td>";           
    }
    ?>
  </tbody>
    </table>
  
  <script src="../asset/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>