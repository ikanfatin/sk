<?php 
require('config.php');
include('menuadmin.php');

//dapatkan ID Topik yang hendak dipadam
$id=$_GET['IDHakim'];

//padam soalan dalam XAMPP
$padam = mysqli_query($con,"DELETE FROM hakim WHERE IDHakim = $id");

//papar mesej jika rekod berjaya dipadam
echo "<script>alert('Hapus hakim berjaya');
			window.location = 'senarai_hakim.php'</script>";
?>