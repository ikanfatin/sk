<?php 
include('config.php');
include ('menuadmin.php');

$NamaPeserta = $_POST['NamaPeserta'];

//membuat query untuk dapatkan data
$sql1= mysqli_query($con, "SELECT * FROM peserta WHERE NamaPeserta like '%$NamaPeserta%'");
$no = 1;
while($row=mysqli_fetch_array($sql1)){
	$peserta = $row['NamaPeserta'];
	$NOKPPeserta = $row['NOKPPeserta'];
	$Markah = $row['Markah'];
}
?>

<html>
<link rel="stylesheet" href="senarai.css">
<centre>
<h2>Keputusan Individu</h2>
<h5>No kad Pengenalan: <?php echo $NOKPPeserta; ?>&emsp;&emsp;
	Nama: <?PHP echo $peserta; ?>&emsp;&emsp;</h5>

<!--papar tajuk jadual-->
<table border='1'>
<tr>
	<th>Aspek</th>
	<th>Markah</th>
</tr>

<?php 
	$sql2 = "SELECT * FROM pertandingan
	JOIN peserta ON pertandingan.NOKPPeserta = peserta.NOKPPeserta
	JOIN penilaian ON pertandingan.IDPenilaian = penilaian.IDPenilaian
	JOIN hakim ON penilaian.IDHakim - hakim.IDHakim
	WHERE pertandingan.NOKPPeserta = '$NOKPPeserta'";

$query = mysqli_query($con,$sql2);

while($hasil = mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $hasil['Aspek']; ?></td>
		<td><?php echo $hasil['skor']; ?></td>
		</tr>
	<?php 
	}
?>
<tr>
	<td><b>Jumlah</b></td>
	<td><b><?php echo $Markah; ?></b></td>
</tr>
</table><br>
<button class="cetak" onclick="window.print()">Cetak</button>
</body>
</center>
</html>