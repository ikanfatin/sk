<?php 
include('config.php');
include('menuhakim.php');

$IDHakim = $_SESSION['user'];
$IDPenilaian = $_SESSION['IDPenilaian'];
$Aspek = $_SESSION['Aspek'];
?>

<?php
if(isset($_POST['simpan'])){
	$NOKPPeserta = $_POST['NOKPPeserta'];
	$tarikh = date('d/m/y');
	$Markah = $_POST('Markah');

$update = "UPDATE peserta SET NOKPPeserta = '$NOKPPeserta', nama =,'$nama', kataLaluan = '$passwd'
			Jantina = '$Jantina', TelPeserta = '$Telpeserta' WHERE NOKPPeserta = '$NOKPPeserta'";


//KEMASKINI DATA DALAM JADUAL XAMPP
$data = "UPDATE pertandingan SET Markah = '$Markah' WHERE NOKPPeserta = '$NOKPPeserta'";
$result = mysqli_query($con,$data);

//papar mesej jika rekod berjaya dikemaskini
echo "<script>alert('Penilaian Peserta Berjaya');
			window.location = senarai_penilaian.php'<script>";
}
?>

<?php
//DAPATKAN ID PESERTA
$idEdit = $_GET['NOKPPeserta'];
$sql = "SELECT * FROM pertandingan
		JOIN peserta ON pertandingan.NOKPPeserta = peserta.NOKPPeserta";

$data =  mysqli_query($con,$sql);
while ($hasil = mysqli_fetch_array($data)){
	//papar data dari XAMPP
	$NOKPPeserta = $hasil['NOKPPeserta'];
	$NamaPeserta = $hasil['NamaPeserta'];
	$Markah = $hasil['Markah'];
}
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="nutton.css">

<body><center><h3 class="panjang">PENILAIAN PESERTA</h3>
<main>
<form class="panjang" method="post">
<table border="0" align="center" style="font-size: 18px">
	<tr>
		<td><center><label><h2>Aspek <?php echo $aspek; ?></h2></center></label></td>
	</tr>
	<tr>
		<td>No Kad Pengenalan:</td>
		<td><label><?php echo $idEdit; ?></label></td>
		<td><input type="hidden" name="nokp" value="<?php echo $idEdit; ?>"/></td>
	</tr>
	<tr>
		<td>Nama Peserta:</td>
		<td><label><?php echo $nama; ?></label></td>
		<td><input type="hidden" name="nama" value="<?php echo $nama; ?>"/></td>
	</tr>
	<tr>
		<td>Markah:</td>
		<td><input type="text" name="Markah" value="<?php echo $Markah;?>"></td>
	</tr>

</table>
<button type="submit" name="simpan">Simpan</button>
<button type="submit" name="cancel" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>






