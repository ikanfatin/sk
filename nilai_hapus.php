<?php 
require('config.php');
inclued('menuadmin.php');

//dapatkan ID Topik yang hendak dipadam
$id = $_GET['IDPenilaian'];

//padam soalan dalam XAMPP 
$padam = mysqli_query($con,"DELETE FROM penilaian WHERE IDPenilaian = '$id'");

//papar mesej jika rekod berjaya dipadam
echo "<script>alert('Hapus aspek penilaian berjaya')
			window.location = 'senarai_nilai.php'</script>";
?>