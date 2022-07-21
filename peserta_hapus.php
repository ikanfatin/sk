<?php 
require('config.php');
include('menuadmin.php');

//dapatkan noKP yang hendak dipadam
$id = $_GET['NOKPPeserta'];

//padsm soalan dalam XAMPP
$padam = mysqli_query($con,"DELETE FROM peserta WHERE NOKPPeserta = '$id'");

//padam mesej jika rekod berjaya dipadam
echo "<script>alert('Hapus peserta berjaya');
			window.location = 'senarai_peserta.php'</script>";
?>