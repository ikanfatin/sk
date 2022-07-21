<?php
include('config.php');
include('menupeserta.php');

$nokp=$_SESSION['user'];
$nama=$_SESSION['name'];
?>

<?php
	//set nilai awal pemboleh ubah
$jumlah=0;

//dapatkan data daripada XAMPP
$sql="SELECT * FROM pertandingan WHERE NOKPPeserta = '$nokp' ORDER BY IDPenilaian ASC";
$data=mysqli_query($con,$sql);
while($rekod = mysqli_fetch_array($data)){
	$IDPenilaian = $rekod['IDPenilaian'];
	$Markah = $rekod['Markah'];

	$Jumlah = $Jumlah +$Markah;

	//masukkan data ke dalam table pertandingan dalam XAMPP
	$sql3="UPDATE pertandingan SET Jumlah = $Jumlah WHERE NOKPPeserta = '$nokp'";
	$datakuiz=mysqli_query($con,$sql3);
}

?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="senarai.css">
<body>
<center>
    <h2>Semak Keputusan Pertandingan</h2>
    <h5>No Kad Pengenalan: <?php echo $nokp; ?> &emsp;&emsp;
        Nama: <?php echo $nama; ?>&emsp;&emsp;</h5>
    <h3></h3>

    <!-- papar jadual -->
    <table border='5'>
        <tr>
            <th>Aspek</th>
            <th>Markah</th>
        </tr>

        <?php
        $jumlah = 0;

        $sql = "SELECT * FROM pertandingan
                JOIN peserta ON pertandingan.NOKPPeserta = peserta.NOKPPeserta
                Join penilaian ON pertandingan.IDPenilaian = penilaian.IDPenilaian
                JOIN hakim ON penilaian.IDhakim = hakim.IDhakim
                WHERE pertandingan.NOKPPeserta = '$nokp'";

        $query = mysqli_query($con, $sql);

        while($hasil = mysqli_fetch_array($query)) {
            $jumlah = $hasil['Jumlah'];
            ?>
            <tr>
                <td><?php echo $hasil['Aspek']; ?></td>
                <td><?php echo $hasil['Markah']; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td><b>Jumlah</b></td>
            <td><b><?php echo $jumlah; ?></b></td>
        </tr>
    </table><br>
    <button class="cetak" onclick="window.print()">Cetak</button>
</body>
</center>
</html>