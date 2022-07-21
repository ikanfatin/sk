<?php
require('config.php');
session_start();

        if (isset($_POST['NOKPPeserta'])) 
        {   //Masukkan pemboleh ubah dari interface ke dalam pemboleh ubah php
            $NOKPPeserta = $_POST['NOKPPeserta'];
            $KataLaluan = $_POST['KataLaluan'];
            //cari maklumat dalam table pelajar dalam XAMPP
            $sql = "SELECT * FROM peserta WHERE NOKPPeserta = '$NOKPPeserta' and KataLaluan = '$KataLaluan'";
            $rekod = mysqli_query($con, $sql);
    
        while ($hasil = mysqli_fetch_array($rekod)) 
        {   $_SESSION['user'] = $hasil['NOKPPeserta'];
            $_SESSION['name'] = $hasil['NamaPeserta'];
            //$status = $hasil['status'];
            $id = $hasil['NOKPPeserta'];
            $pass = $hasil['KataLaluan'];

        if ($status == 'ADMIN') 
            {echo "<script>alert('LOG MASUK SEBAGAI PENTADBIR BERJAYA'); window.location = 'menuadmin.php'</script>";} 
        
        else 
            {echo "<script>alert('ANDA BERJAYA MASUK KE DALAM MENU PESERTA'); window.location = 'menupeserta.php'</script>";}

        if ($NOKPPeserta != $id or $KataLaluan != $pass)
            {echo "<script>alert('LOG MASUK GAGAL'); window.location = 'login.php'</script>";}
        }
        }
?>

<!------------------ INTERFACE ------------------>
<html>
<style>
body
{background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(targetbaru.jpg);
background-size: 100%;}

button
{width: 16%;
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

button[class="back"]
{margin: 10px;
width: 10%;
border-radius: 30px;
background-color: white;
color: black;
border: none;
padding: 16px;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;}
button[class="back"]:hover
{background-color: brown;}

form
{text-align: center;
margin: 60px;}


input[type="text"],input[type="password"]
{padding: 12px 20px;
width: 20%;
margin: 8px 0;
border-radius: 20px;
border: 1px solid red;
display: inline-block;
box-sizing: border-box;
background-color: white;
text-align: center;}

label
{color: white;
margin: 8px;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;}

h3
{font-size: 50px;
font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
color: aliceblue;
text-align: center;
margin: 30px;}

.Maklumat
{font-size: 35px;
font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
color: aliceblue;
text-align: center;
margin: 25px;}
</style>

<body>
    
    <div class="maklumat">
        <h3 class="pendek">LOG MASUK MENU PESERTA</h3>
        <P>ISI BORANG INI UNTUK MASUK KE MENU PESERTA</P>
    </div>
    
    <form class="pendek" method="POST">
        <label>No Kad Pengenalan</label>
        <br>
        <input type="text" name="NOKPPeserta" placeholder="tanpa tanda'-'" required>
        <br>
        <label>Kata Laluan</label>
        <br>
        <input type="password" name="KataLaluan" placeholder="8 karakter" required>
        <br>
        <button class="login" type="submit">Log Masuk Ke Menu Peserta</button>
        <br>
        <a href="index.html"><button class="back" type="button">Go Back</button></a>
    </form>
    
</body>
</html>