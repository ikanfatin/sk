<?php
include('config.php');
include('menuadmin.php');

$IDHakim = $_POST['IDHakim'];
$query = mysqli_query($con,"SELECT NamaHakim FROM hakim
							WHERE IDHakim = '$IDHakim'");
$hasil = mysqli_fetch_array($query);
$hakim = $hasil['NamaHakim'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesshet" href="senarai.css">
	<link rel="stylesheet" href="button.css">
</head>
</center>
<body>
<h3>PENILAIAN MENGIKUT HAKIM</h3>
<h4>Hakim: <?php echo $hakim; ?></h4>
<table>
	<tr>
		<th>Bil</th>
		<th>NO KP</th>
		<th>Nama Peserta</th>
		<th>Skor</th>
	</tr>

<?php 
$bil =1;
$sql = "SELECT * FROM pertandingan
		JOIN peserta ON pertandingan.NOKPPeserta = peserta.NOKPPeserta
		JOIN penilaian ON pertandingan.IDPenilaian = penilaian.IDPenilaian
		JOIN hakim ON pertandingan.IDHakim = hakim.IDHakim
		WHERE pertandingan.IDHakim = '"$.IDHakim."' ";

$query = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $bil; ?></td>
		<td><?php echo $row['NOKPPeserta']; ?></td>
		<td><?php echo $row['NamaPeserta']; ?></td>
		<td><?php echo $row['skor']; ?></td>
	</tr>
	<?php
	$bil = $bil+1
	}
	?>
</table><br>
<button class="cetak" onclick="window.print()">Cetak</button>
</body>
</center>
</html>