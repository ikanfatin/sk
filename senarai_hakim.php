<?php
include('config.php');
include('menuadmin.php');
?>

<!DOCTYPE html>
<html>
<style>
body
{background-image: url(targetbaru.jpg);
background-size: 100%;}

table
{font-family: 'Josefin Sans', sans-serif;
font-size: 12px;
font-weight: normal;
text-align: center;
width: 650px;
margin: 0px auto;
border-collapse: collapse;
box-shadow: 15px 15px 6px rgba (96, 96, 96, 0.7);}

caption
{font-size: 16px;
font-weight: bold;
color: white;
background-color: darkkhaki;
padding: 8px;
padding-bottom: 6px}

td, th
{padding: 8px;
border: 2px solid darkkhaki;}

td.nama
{width: 150px;
text-align: left;}

tr:nth-child(odd)
{background-color: bisque;}

tr:nth-child(even)
{
background-color: papayawhip;}

th
{font-weight: bold;
color: black;
background-color: moccasin;}
</style>



<body>
<center><h2>Senarai Hakim</h2>

<!--papar jadual-->
<table border='0'>
	
				<tr>
					<th>Bil</th>
					<th>ID Hakim</th>
					<th>Nama Hakim</th>
					<th>Kata Laluan</th>
					<th>Nombor Telefon</th>
					<th colspan="2">Tindakan</th>
				</tr>

<?php 
//membuat query untuk dapatkan data
$hasil = mysqli_query($con,"SELECT * FROM hakim");
$no = 1;

//umpukkan data yan ditemui ke dalam tatasusunan $row
while($row = mysqli_fetch_array($hasil))
	{
	?>
	<!--papar data di dalam jadual-->
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['IDHakim'];?></td>
		<td><?php echo $row['NamaHakim'];?></td>
		<td><?php echo $row['KataLaluanH'];?></td>
		<td><?php echo $row['TelHakim'];?></td>

		<td><a href="hakim_edit.php?idhakim=<<?php echo $row['IDHakim']; ?>"
			onclick="return confirm('Anda pasti?')"><u>Kemaskini</u></a></td>
		<td><a href="hakim_hapus.php?idhakim=<?php echo $row['IDHakim']; ?>"
			onclick="return confirm('Anda pasti?')"><u>Padam</u></a></td>
	</tr>
	<?php
		$no++;
	}
	?>
</table>
</center>
</body>
</html>


