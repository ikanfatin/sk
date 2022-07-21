<?php
include('config.php');
include('menupeserta.php');

//DAPATKAN ID Pelajar
$nokp = $_SESSION['user'];

//Dapatkan data daripada XAMPP
$pesertaedit = mysqli_query($con, "SELECT * FROM peserta WHERE NOKPPeserta = $nokp");
while($data = mysqli_fetch_array($pesertaedit)){
    //papar data dari XAMPP
    $NamaPeserta = $data['NamaPeserta'];
    $KataLaluan = $data['KataLaluan'];
    $Jantina = $data['Jantina'];
    $TelPeserta = $data['TelPeserta'];
}
?>

<!DOCTYPE html>
<html>
    
    

<body><center><h3 class="panjang">KEMASKINI PESERTA</h3>

<main>
    <form class="panjang" action="updatepeserta2.php" method="post">
    <table border="0" align="center" style="font-size: 18px">
        
    <tr>
    <td>No Kad Pengenalan:</td>
    <td><label><?php echo $nokp; ?></label>
    <input type="hidden" name="NOKPPeserta" value="<?php echo $nokp; ?>"/></td>
    </tr>

    <tr>
    <td>Nama Peserta:</td>
    <td><input type="text" name="NamaPeserta" value="<?php echo $NamaPeserta; ?>" /></td>
    </tr>

</table>

<button class="edit" type="submit">EDIT NAMA</button>

</form>
</html>
    