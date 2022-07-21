<?php
//sambung ke pangkalan data
require('config.php');

//memastikan pengguna login terlebih dahulu
//include('pengesahan.php');
include('menupeserta.php');

//dapatkan id login dari sesi login
$id = $_SESSION['user'];

//mendapatkan data pelajar daripada XAMPP
$peserta = mysqli_query($con, "SELECT * FROM PESERTA WHERE NOKPPeserta = '$id'");

while($data = mysqli_fetch_array($peserta)) 
{   //papar data daru XAMPP
    $NOKPPeserta = $data['NOKPPeserta'];
    $NamaPeserta = $data['NamaPeserta'];
    $KataLaluan = $data['KataLaluan'];
    $Jantina = $data['Jantina'];
    $TelPeserta = $data['TelPeserta'];  }
?>

<!DOCTYPE html>
<html>

<style>
button
{width:10%;
padding:12px ;
background-color: rgb(45, 18, 88);
margin: 2px;
color: white;
border: none;
border-radius: 30px;
cursor: pointer;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif }
button:hover
{background-color: rgb(18, 78, 128);
text-align: center;}

form
{text-align: center;
margin: 8px;
border: 0;}

body
{background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(targetbaru.jpg);
background-size: 100%;}

label
{color: white;
margin: 8px;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;}

input[type="text"],input[type="password"]
{width: 20%;
padding: 10px 20px;
margin: 8px 0;
border-radius: 20px;
border: 1px solid red;
display: inline-block;
box-sizing: border-box;
background-color: white;}

h3
{font-size: 16px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;
color: yellow;
text-align: center;
margin: 30px;}

</style>
    
    <body>
        
        <div>
            <h3 class="panjang">MAKLUMAT PESERTA</h3>
        <div>
    
    <form action="updatepeserta.php" class="panjang" method="POST">
        <label>Nombor Kad Pengenalan : </label>
        <label><?php echo $id; ?></label>
        <br>
        <label>Nama Peserta<label>
        <br>
        <input type="text" name="NamaPeserta" value="<?php echo $NamaPeserta; ?>" readonly>
        <br>
        <label>Kata Laluan</label>
        <br>
        <input type="password" name="KataLaluan" value="<?php echo $KataLaluan; ?>" readonly>
        <br>
        <label>Jantina</label>
        <br>
        <input type="text" name="Jantina" value="<?php echo $Jantina; ?>" readonly>
        <br>
        <label>Nombor Telefon:</label>
        <br>
        <input type="text" name="TelPeserta" value="<?php echo $TelPeserta; ?>" readonly>
        <br>
        <button type="submit" name="update">Edit</button>
    </form>
    
</body>
</html>
