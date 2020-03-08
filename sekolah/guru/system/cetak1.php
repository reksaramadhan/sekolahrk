<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA SISWA</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN SISWA</h2>

	</center>

	<?php 
	include '../aksi/koneksi.php';
	?>
   
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
		while($row = mysqli_fetch_array($sql)){
		?>
		<div class="container">
			<div class="col-sm">
				<hr>
			No. : <?php echo $no++;?><br>
                     <?php echo "<img src='../aksi/images/".$row['foto']."'align='right' width='100' height='80'>";?>
                    Nis : <?php echo $row['nis'];?><br>
                    Nama : <?php echo $row['nama'];?><br>
                    Tanggal Lahir : <?php echo $row['tanggal_lahir']; ?><br>
                    Alamat : <?php echo $row['alamat']; ?><br>
                    Kelas : <?php echo $row['tingkat']; ?><br>
                    Jurusan : <?php echo $row['ket']; ?><br>
                <hr>
        </div>
		</div>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>