<?php
include('config.php');
include('menuhakim.php');

$IDHakim = $_SESSION['user'];
$IDPenilaian = $_SESSION['IDPenilaian'];
$Aspek = $_SESSION['Aspek'];
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="senarai.css">

<body>
<center>
<h2>Senarai Penilaian Pertandingan</h2><br>
<h3>Aspek: <?php echo $Aspek; ?></h3>


<!--papar jadual-->
<table border='1'>
	<tr>
		<th>Bil/</th>
		<th>No Kad Pengenalan</th>
		<th>Nama Peserta</th>
		<th>Markah penuh</th>
		<th>Markah</th>
		<th colspan="2">Tindakan</th>
	</tr>

<?php 

$sql = "SELECT * FROM pertandingan
		JOIN peserta ON pertandingan.NOKPPeserta = peserta.NOKPPeserta
		JOIN penilaian ON pertandingan.IDPenilaian = penilaian.IDPenilaian
		WHERE pertandingan.IDPenilaian = '$IDPenilaian'";

$hasil = mysqli_query($con,$sql);
$no = 1;

//umpukkan data yang ditemui di dalam tatasusunan $row
while ($row = mysqli_fetch_array($hasil)) 
{
?>
	
	<!--papar data di dalam jadual-->
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['NOKPPeserta']; ?></td>
		<td><?php echo $row['NamaPeserta']; ?></td>
		<td><?php echo $row['Jumlah']; ?></td>
		<td><?php echo $row['Markah']; ?></td>

		<td><a href="penilaian_edit.php?NOKPPeserta=<?php echo $row['NOKPPeserta']; ?>"
			onclick="return confirm('Anda Pasti?')">,<u>Kemaskini</u></a></td>
		<td><a href="penilaian_hapus.php?NOKPPeserta=<?php echo $row['NOKPPeserta']; ?>"
			onclick="return confirm('Anda Pasti?')"><u>Padam</u></a></td>
	</tr>

	<?php
	$no++;
    }
	?>
</table>
</center>
</body>
</html>
