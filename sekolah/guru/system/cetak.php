<?php 
		include '../aksi/koneksi.php';
		?>

<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>

	<center>

		<h2>CETAK PRINT DATA DARI DATABASE DENGAN PHP<br/><a href="https://www.malasngoding.com">WWW.MALASNGODING.COM</a></h2>


		

		<table border="1">
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from barang_masuk");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>

		<br/>

		<a href="cetak.php" target="_blank">CETAK</a>


	</center>
</body>
</html>