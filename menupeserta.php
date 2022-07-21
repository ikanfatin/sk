<?php
include ('config.php');
include ('pengesahan.php');


$NamaPeserta = $_SESSION['name'];
?>
<!--HTML bermula-->
<html>
<link rel="stylesheet" href="menu_pengguna.css">

<style>
h2,h5
{color: #ffffff;}

body
{background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(targetbaru.jpg);
font-family: cooper black;
background-size: 100%;}

</style>

<head><center>
	<br><h2>MENU PESERTA</h2>
	<h5><?php echo $NamaPeserta; ?></h5>

</center></head>
<body>
	
	<ul class="nav">
		<li><a href="infopeserta.php">Info Peserta </a></li>
		<li><a href="semak_markah.php">Semak Keputusan </a></li>
		<li><a href="logout.php"onclick="return confirm('PEGI MAMPUH TUBIK KENALING ')">Log Keluar</a></li>
	</ul>
</body>
</html>
