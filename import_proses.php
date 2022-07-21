<?php 
include('config.php');
include('menuadmin.php');

	$fail = fopen("data.txt","r");
	while(!feof($fail)){
		$medan = explode(',',fgets($fail));

		$NOKPPeserta = $medan[0];
		$NamaPeserta = $medan[0];
		$KataLaluan = $medan[0];
		$Jantina = $medan[0];
		$TelPeserta = $medan[0];
		$Status = $medan[0];
		$Markah = $medan[0];

		$sql = "INSERT INTO peserta(NOKPPeserta,NamaPeserta,KataLaluan,Jantina,TelPeserta,Status,Markah)
				VALUE('$NOKPPeserta','$NamaPeserta','$KataLaluan','$Jantina','$TelPeserta','$Status','$Markah')";

		$hasil = mysqli_query($con,$sql);

		if($hasil){
			echo"<script>alert('Rekod berjaya diimport');</script>";
		}else{
			echo"<script>alert('Rekod tidak berjaya diimport');</script>";
		}
		mysqli_close($con);
?>
<html>
<link rel="stylesheet" href="senarai.css">
<center>
<table>
	<caption>MAKLUMAT PESERTA</caption>
	<tr>
		<th>No KP</th>
		<th>Nama</th>
		<th>Kata Laluan</th>
		<th>Jantina</th>
		<th>Telefon</th>
		<th>Status</th>
		<th>Markah</th>
	</tr>
	<tr>
		<td><?php echo $NOKPPeserta ?></td>
		<td><?php echo $NamaPeserta ?></td>
		<td><?php echo $KataLaluan ?></td>
		<td><?php echo $Jantina ?></td>
		<td><?php echo $TelPesert ?></td>
		<td><?php echo $Status ?></td>
		<td><?php echo $Markah ?></td>
	</tr>
	<?php } ?>
</table>
</center>
