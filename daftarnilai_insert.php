<?php 
include('config.php');

$IDPenilaian = $_POST["IDPenilaian"];
$Aspek = $_POST["Aspek"];
$Markah = $_POST["Markah"];
$IDHakim = $_POST["IDHakim"];

$sql = "INSERT INTO penilaian (IDPenilaian,Aspek,Markah,IDHakim)
		VALUES ('$IDPenilaian','$Aspek','$Markah','$IDHakim')";

$result = mysqli_query($con,$sql);
if($result){
	echo"<script>('Maklumat Penilaian Berjaya Disimpan');
	window.location = 'senarai_nilai.php'</script>";
}else{
	echo"<script>alert('Maklumat Penilaian Gagal Disimpan');
	window.location = 'menuadmin.php'</script>";
}
?>