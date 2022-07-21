<?php
include('config.php');

$IDHakim = $_POST["IDHakim"];
$NamaHakim = $_POST["NamaHakim"];
$KataLaluanH = $_POST["KataLaluanH"];
$TelHakim = $_POST["TelHakim"];

$sql = "INSERT INTO hakim (IDHakim,NamaHakim,KataLaluanH,TelHakim)
	VALUES ('$IDHakim','$NamaHakim','$KataLaluanH','$TelHakim')";

$result = mysqli_query($con,$sql);

if($result)
{echo"<script>alert('Pendaftaran Hakim Berjaya');
	window.location = 'loginhakim.php'</script>";}
	
else
{echo"<script>alert('Pendaftaran Hakim Gagal');
	window.location = 'menuadmin.php'</script>";}
?>