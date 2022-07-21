<?php 
include('config.php');
include('manuadmin.php');
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="senarai.css">

<body>
<center><h2>Senarai Markah Peserta</h2>
<table>
<tr><th>Bil</th>
	<th>No KP</th>
	<th>Nama Peserta</th>
	<th>Tema</th>
	<th>Ilustrasi</th>
	<th>Gubahan</th>
	<th>Warna</th>
	<th>Kemasan</th>
	<th>Jumlah</th>
</tr>

<?php
$bil = 1;
//membuat query untuk dapatkan data
$query1 = mysqli_query($con,"SELECT * FROM peserta");
while($row = mysqli_fetch_array($query1)){
	$NOKPPeserta = ['NOKPPeserta'];
	$NamaPeserta = ['NamaPeserta'];
	$Markah = ['Markah'];

$sql2 = "SELECT * FROM pertandingan
		WHERE NOKPPeserta = '$NOKPPeserta'
		ORDER BY IDPenilaian ASC";

$query2 = mysqli_query($con,$sql2);
$a = 1;


while($data = mysqli_fetch_array($query2)){
	if($a ==1)
		echo "<tr>
				<td>".$bil."</td>
				<td>".$NOKPPeserta."</td>
				<td>".$NamaPeserta."</td>";
	if($ < 6)
		echo "<td>".$data['skor']."</td>";

	$a = $a +1;
	if($a == 6){
		echo "<td>".$Markah."</td>
		</tr>";

		$a = 1;
		$bil = $bil +1;
	}
}
}
?>

</tr>
</table>
</center>
</body>
</html>