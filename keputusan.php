<?php
include('config.php');
include('menuadmin.php');

$query1 = mysqli_query($con,"SELECT * FROM peserta");
while($row = mysqli_fetch_array($query1)){
	$jumlah = 0;
	$NOKPPeserta = $row['NOKPPeserta'];

$sql2 = "SELECT * FROM pertandingan
		 WHERE NOKPPeserta = '$NOKPPeserta'
		 ORDER BY IDPenilaian ASC";

$query2 = mysqli_query($con,$sql2);

	while($hasil = mysqli_fetch_array($query2)){
		$markah = $hasil['Skor'];
		$Jumlah = $Jumlah + $Markah;
	}
		//masukkan data ke dalam table peserta dalam XAMPP
		$sql3="UPDATE peserta SET Markah = '$Jumlah' WHERE NOKPPeserta = '$NOKPPeserta'";
		$markahpeserta = mysqli_query($con,$sql3);

		//update data ke dalam table pertandingan dalam XAMPP
		$sql4="UPDATE pertandingan SET Jumlah = '$Jumlah' WHERE NOKPPeserta = '$NOKPPeserta'";
		$updateJumlah = mysqli_query($con,$sql4);
}
?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="senarai.css">

<body>
<center><h2>Keputusan Pertandingan e-memanah 2022</h2>

<!--papar jadual-->
<table border='1'>
	<tr>
		<th>No</th>
		<th>No KP</th>
		<th>Nama</th>
		<th>Markah</th>
	</tr>
<?php 
$no = 1;
$query3 = mysqli_query($con,"SELECT * FROM peserta WHERE NOKPPeserta != '0000' ORDER BY Markah DESC");
while($data = mysqli_fetch_array($query3)){
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['NOKPPeserta']; ?></td>
		<td><?php echo $data['NamaPeserta']; ?></td>
		<td><?php echo $data['Markah']; ?></td>
	</tr>

<?php
$no++;
}
?>
</table><br>
<button class="cetak" onclick="window.print()">Cetak</button>
</body>
</center>
</html>