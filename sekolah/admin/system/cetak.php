<?php
include('../aksi/koneksi.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$sql = $_GET ['id_siswa'];
$query = mysqli_query($conn,"SELECT*FROM siswa INNER JOIN kelas on siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE id_siswa='$sql'");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Foto</th>
<th>Nis</th>
<th>Nama</th>
<th>Tanggal Lahir</th>
<th>Alamat</th>
<th>Tingkat</th>
<th>Keterangan</th>
</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
$html .= "<tr>
<td>".$no."</td>
<td img src='../aksi/images/".$row['foto']."'></td>
<td>".$row['nis']."</td>
<td>".$row['nama']."</td>
<td>".$row['tanggal_lahir']."</td>
<td>".$row['alamat']."</td>
<td>".$row['tingkat']."</td>
<td>".$row['ket']."</td>
</tr>";
$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
?>


