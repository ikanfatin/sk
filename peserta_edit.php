<?php 
include('config.php');
include('menuadmin.php');

		if(isset($_POST['update']))
		{	$NOKPPeserta = $_POST['NOKPPeserta'];
			$NamaPeserta = $_POST['NamaPeserta'];
			$KataLaluan = $_POST['KataLaluan'];
			$Jantina = $_POST['Jantina'];
			$TelPeserta = $_POST['TelPesertax'];
		
		//KEMASKINI DATA DALAM XAMPP
			$update = "UPDATE peserta SET NOKPPeserta = '$NOKPPeserta',NamaPeserta = '$NamaPeserta', kataLaluan = '$KataLaluan',
				Jantina = '$Jantina',TelPeserta = '$Telpeserta' WHERE NOKPPeserta = '$NOKPPeserta'";
			$result = mysqli_query($con,$update);

		//papar mesej jika rekod berjaya dikemaskini
			echo "<script>alert('kemaskini maklumat peserta berjaya');
			window.location = 'senarai_peserta.php'</script>";	}

?>
<?php 

		//DAPATKAN ID PESERTA
			$pesertaedit = $_GET['NOKPPeserta'];
			$sql = mysqli_query($con,"SELECT * FROM peserta WHERE NOKPPeserta = $pesertaedit");
		
		while($hasil=mysqli_fetch_array($sql))
		{	//papar data dari XAMPP
			$NOKPPeserta = $hasil['NOKPPeserta'];
			$NamaPeserta = $hasil['NamaPeserta'];
			$KataLaluan = $hasil['KataLaluan'];
			$Jantina = $hasil['Jantina'];
			$TelPeserta = $hasil['TelPeserta'];	}

?>

<!DOCTYPE html>
<html>
	
	<link rel="stylesheet" href="borang.css">
	<link rel="stylesheet" href="button.css">

<body>
	<center><h3 class="panjang">KEMASKINI MAKLUMAT PESERTA</h3>

	<main>
		<form class="panjang" method="post">
		<table border="0" align="center" style="font-size: 18px">
		
			<tr>
			<td>Nombor Kad Pengenalan:</td>
			<td><label><?php echo $pesertaedit; ?></label></td>
			<td><input type="hidden" name="NOKPPeserta" value="<?php echo $pesertaedit; ?>"/></td>
			</tr>
		
			<tr>
			<td>Nama Peserta:</td>
			<td><input type="text" name="NamaPeserta" value="<?php echo $NamaPeserta; ?>"/></td>
			</tr>
		
			<tr>
			<td>Kata Laluan:</td>
			<td><input type="text" name="KataLaluan" value="<?php echo $KataLaluan; ?>"/></td>
			</tr>
	
			<tr>
			<td>Jantina:</td>
			<td><input type="text" name="Jantina" value="<?php echo $Jantina; ?>"/></td>
			</tr>
	
			<tr>
			<td>Nombor Telefon:</td>
			<td><input type="text" name="TelPeserta" value="<?php echo $TelPeserta; ?>"/></td>
			</tr>
	
		</table>
		
			<button type="submit" name="update">Update</button>
			<button type="submit" name="cancel" onclick="history.back()">Batal</button>
		
		</form>
	</main>

	</center>
</body>
</html>


