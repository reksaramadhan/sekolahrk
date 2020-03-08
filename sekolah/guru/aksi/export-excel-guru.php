<?php  
				include 'koneksi.php';
				$no = 1;
				$select = mysqli_query($conn, "SELECT*FROM guru");
			?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=guru.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
    <thead>
        <tr>
                        <th>No</th>
                            <th>ID Guru</th>
                            <th>Kode Guru</th>
                            <th>Nama Guru</th>
                            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$hasil['id_guru']."</td>";
            echo "<td>".$hasil['kode_guru']."</td>";
            echo "<td>".$hasil['nm_guru']."</td>"; 
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