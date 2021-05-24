<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from pendaftaran");
$html = '<center><h3> Data Pendaftar </h3></center></hr></br>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk</th>
<th>NIS</th>
<th>Nomor Ujian</th>
<th>Paud</th>
<th>TK</th>
<th>SKHUN</th>
<th>Ijazah</th>
<th>Hobi</th>
<th>Cita - Cita</th>
<th>Nama Lengkap</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khuus</th>
<th>Alamat Jalan</th>
<th>RT</th>
<th>RW</th>
<th>Nama Dusun</th>
<th>Nama Kelurahan/Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Transportasi</th>
<th>No. HP</th>
<th>Telefon</th>
<th>Email</th>
<th>Penerima KPS</th>
<th>No KPS</th>
<th>Kewarganaegaraan</th>
<th>Nama Negara</th>
</tr>';
$no = 1;
while($row = mysqli_fetch_array($query)){
	$html .= "<tr>
	<td>".$no."</td>
	<td>".$row['jenis_pendaftaran']."</td>
	<td>".$row['tanggal_masuk']."</td>
	<td>".$row['nis']."</td>
	<td>".$row['nomer_peserta']."</td>
	<td>".$row['paud']."</td>
	<td>".$row['tk']."</td>
	<td>".$row['skhun']."</td>
	<td>".$row['ijazah']."</td>
	<td>".$row['hobi']."</td>
	<td>".$row['citacita']."</td>
	<td>".$row['nama']."</td>
	<td>".$row['jenis_kelamin']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tempat_lahir']."</td>
	<td>".$row['tanggal_lahir']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['berkebutuhan_khusus']."</td>
	<td>".$row['alamat']."</td>
	<td>".$row['rt']."</td>
	<td>".$row['rw']."</td>
	<td>".$row['dusun']."</td>
	<td>".$row['desa']."</td>
	<td>".$row['kecamatan']."</td>
	<td>".$row['kode_pos']."</td>
	<td>".$row['tempat_tinggal']."</td>
	<td>".$row['transportasi']."</td>
	<td>".$row['nohp']."</td>
	<td>".$row['telp']."</td>
	<td>".$row['email']."</td>
	<td>".$row['penerima_kps']."</td>
	<td>".$row['nokps']."</td>
	<td>".$row['kewarganegaraan']."</td>
	<td>".$row['nama_negara']."</td>
	</tr>";
	$no++;

}
$html .= "</html>";
$dompdf->loadHtml($html);
// setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file pdf
$dompdf->stream('Data_Pendaftar.pdf');
?>
