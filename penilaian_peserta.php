<?php
include('config.php');
include('menuhakim.php');

$IDHakim = $_SESSION['user'];
$IDPenilaian = $_SESSION['IDPenilaian'];
$Aspek = $_SESSION['Aspek'];
?>

<?php
if (isset($_POST['simpan'])){
	$NOKPPeserta = $_POST['NOKPPeserta'];
	$Markah = $_POST['Markah'];

	//set tarikh
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$tarikh = date('d/m/m');


	//SIMPAN DATA DALAM JADUAL XAMPP
	$data = "INSERT INTO pertandingan(NOKPPeserta,IDPenilaian,IDHakim,Tarikh,Markah)
	VALUES ('$NOKPPeserta','$IDPenilaian','$IDHakim','$Tarikh','$Markah,)";
	$result = mysqli_query($con,$data);

	//papar mesej jika rekod berjaya dikemaskini
	echo "<script>alert('Penilaian peserta berjaya');
				window.location = senarai_penilaian.php'</script>";
}
?>

<?php
//DAPATKAN ID PESERTA
$pesertaEdit = $_GET['NOKPPeserta'];

$sql=mysqli_query($con, "SELECT * FROM peserta WHERE NOKPPeserta = $pesertaEdit");
while($hasil = mysqli_fetch_array($sql)){
	//papar data dari XAMPP
	$NOKPPeserta = $hasil['NOKPPeserta'];
	$NamaPeserta = $hasil['NamaPeserta'];
}
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<body><center><h3 class="panjang"> PENILAIAN PESERTA</h3>
<main>
<form class="panjang" method="post">
<table border="0" align="center" style="font-size: 18px;">
	<tr>

		<td><center><lebel><h2> Aspek <?php echo $aspek; ?></h2></center></lebel></label></td>
	</tr>
	<tr>
		<td>No Kad Pengenalan:</td>
		<td><lebel><?php echo $nama; ?></lebel></td>
		<td><input type="hidden" name="NOKPPeserta" value="<?php echo $pesertaEdit; ?>"/></td>
	</tr>
	<tr>
		<td>Nama Peserta:</td>
		<td><label><?php echo $nama; ?></label></td>
		<td><input type="hidden" name="nama" value="<?php echo $nama; ?>"/></td>
	</tr>
	<tr>
		<td>Markah:</td>
		<td><input type="text" name="markah"></td>
	</tr>

</table>
<button type="submit" name="simpan">Simpan</button>
<button type="submit" name="cancel" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>
