<?php  
				include 'koneksi.php';
				$no = 1;
				$select = mysqli_query($conn, "SELECT*FROM siswa");
			?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=siswa.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
    <thead>
        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<td>".$hasil['nis']."</td>";
            echo "<td>".$hasil['nama']."</td>"; 
            echo "<td>".$hasil['tanggal_lahir']."</td>";
            echo "<td>".$hasil['alamat']."</td>"; 
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