<?php 
include('config.php');
include('menuadmin.php');
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="senarai.css">

<body>
<center><h2>Senarai Peserta Pertandingan</h2>

<!--papar jafdual-->
<table border='1'>
	<tr>
		<th>Bil.</th>
		<th>No Kad Pengenalan</th>
		<th>Nama Peserta</th>
		<th>Kata Laluan</th>
		<th>Jantina</th>
		<th>Status</th>
		<th>Telefon</th>
		<th colspan="2">Tindakan</th>
	</tr>

<?php 
//membuat query untuk dapatkan data
$hasil = mysqli_query($con,"SELECT * FROM peserta WHERE NOKPPeserta != '0000'");
$no = 1;

//umpukkan data yang ditemui ke dalam tatasusunan $row
while($row = mysqli_fetch_array($hasil))
{
	?>
	<!--papar data di dalam jadual-->
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $row['NOKPPeserta']; ?></td>
		<td><?php echo $row['NamaPeserta']; ?></td>
		<td><?php echo $row['KataLaluan']; ?></td>
		<td><?php echo $row['Jantina']; ?></td>
		<td><?php echo $row['Status']; ?></td>
		<td><?php echo $row['TelPeserta']; ?></td>

		<td><a href="peserta_edit.php?NOKPPeserta=<?php echo $row['NOKPPeserta']; ?>"
						onclick="return confirm('Anda Pasti?')"><u>Kemaskini</u></a>
		<a href="peserta_hapus.php?NOKPPeserta=<?php echo $row['NOKPPeserta']; ?>"
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