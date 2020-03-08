<?php  
				include 'koneksi.php';
				$no = 1;
				$select = mysqli_query($conn, "SELECT*FROM jurusan");
			?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=jurusan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
    <thead>
        <tr>
                        <th>No</th>
                            <th>ID Jurusan</th>
                            <th>Nama Jurusan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$hasil['id_jurusan']."</td>";
            echo "<td>".$hasil['jurusan']."</td>";  
            echo "</td>";
            echo "</tr>";
      
        }
        ?>
    </tbody>
    </table>
  
  <script src="../asset/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>