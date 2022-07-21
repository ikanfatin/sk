<?php 
include('config.php');
include('menuadmin.php');
?>

<?php
if (isset($_POST['update'])){
	$IDPenilaian = $_POST['IDPenilaian'];
	$Aspek = $_POST['Aspek'];
	$Markah = $_POST['Markah'];
	$IDHakim = $_POST['IDHakim'];

//KEMASKINI DATA DALAM JADUAL XAMPP
$update = "UPDATE penilaian SET Aspek = '$Aspek',Markah = '$Markah', 
			IDHakim = '$IDHakim', WHERE IDPenilaian = '$IDPenilaian' " ;
$result = mysqli_query($con,$update);

//papapr mesej jika rekod berjaya dikemaskini
echo "<script>alert('kemaskini rekod hakim berjaya');
			window.location='senarai_nilai.php'</script";
}
?>

<?php 
//DAPATKAN ID HAKIM
$nilaiEdit = $_GET['IDPenilaian'];
$sql = mysqli_query($con, "SELECT * FROM penilaian WHERE IDPenilaian = $nilaiEdit");
while ($hasil = mysqli_fetch_array($sql)){
	//papar data dari XAMPP
	$IDPenilaian = $hasil['IDPenilaian'];
	$Aspek = $hasil['Aspek'];
	$Markah = $hasil['Markah'];
	$IDHakim = $hasil['IDHakim'];
}
?>

<!DOCTYPE html>
<html>
<link rel="styelesheet" href="borang.css">
<link rel="styelesheet" href="button.css">

<body><center><h3 class="panjang">KEMASKINI MAKLUMAT PENILAIAN</h3>
<main>
<form class="panjang" method="post">
<table border="0" align="center" style="font-size: 18px">
	<tr>
		<td>ID Penilaian:</td>
		<td><label><?php echo $nilaiEdit; ?></label></td>
		<td><input type="hidden" name="aspek" value="<?php echo $nilaiEdit; ?>"/></td>
	</tr>
	<tr>
		<td>Aspek Penilaian:</td>
		<td><input type="text" name="aspek" value="<?php echo $Aspek; ?>"/></td>
	</tr>
	<tr>
		<td>Markah:</td>
		<td><input type="text" name="Markah" value="<?php echo $Markah; ?>"/></td>
	</tr>
	<tr>
		<td>ID Hakim: </td>
		<td><input type="text" name="IDHakim" value="<?php echo $IDHakim; ?>"/></td>
	</tr>

</table>
<button type="submit" name="update">Update</button>
<button type="submit" name="cancel" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>
