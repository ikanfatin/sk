<?php 
include('config.php');
include('menuhakim.php');

?>

 <!DOCTYPE html>
 <html>
<style>
body
{background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(targetbaru.jpg);}


</style>

 <body>
 	<center><h2>Senarai Peserta Pertandingan</h2>

<!--papar jadual-->
<table border='1'>
	<tr>
		<th>Bil</th>
		<th>Nombor Kad Pengenalan</th>
		<th>Nama Peserta</th>
		<th colspan="2">Tindakan</th>
	</tr>

<?php

$sql = "SELECT * FROM peserta WHERE NOKPPeserta !='0000' ";

$hasil = mysqli_query($con,$sql);
$no = 1;

//umpukkan data yang ditemui ke dalam tatasusunan $row
while($row = mysqli_fetch_array($hasil))
{
?>

	<--papar data di dalam jadual-->
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['NOKPPeserta'];?></td>
		<td><?php echo $row['NamaPeserta'];?></td>

		<td><a href="penilaian_peserta.php?nokp=<?php echo $row['NOKPPeserta'];?>"
		onclick="return confirm('Anda Pasti?')"><u>Nilai</u></a></td>
	</tr>

	<?php 
	$no++;
    }
	?>
</table>
</center>
</body>
</html>