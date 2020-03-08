<?php  
				include 'koneksi.php';
				$select = mysqli_query($conn, "SELECT*FROM user");
			?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=user.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
    <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while($hasil = mysqli_fetch_array($select)){
            echo "<tr>";
            echo "<td>".$hasil['username']."</td>";
            echo "<td>".$hasil['password']."</td>";
            echo "<td>".$hasil['user_role']."</td>";  
            echo "</tr>";
      
        }
        ?>
    </tbody>
    </table>
  </body>
</html>