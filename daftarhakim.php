<?php
include('config.php');

//kira jumlah soalan dalam senarai
$sql = "SELECT IDHakim FROM hakim";
$data = mysqli_query($con,$sql);
$total = mysqli_num_rows($data);
$no = $total+1000;
?>

<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>

INPUT[type="text"] 
{width:  200px;
padding: 5px;
margin: 5px;}

</style>

  <body>
    
    <div>
      <h3 class="panjang">DAFTAR HAKIM</h3>
    </div>

    <form class="panjang" action="daftarhakim_insert.php" method="post">
    
    <table>
      
      <tr>
      <td>ID Hakim</td>
      <td><label><?php echo $no; ?></label>
      <input type="text" value="<?php echo $no;?>" name="IDHakim" hidden></td>
      </tr>

      <tr>
      <td>Nama Hakim</td>
      <td><input type="text" name="NamaHakim" required></td>
      </tr>

      <tr>
      <td>Kata Laluan</td>
      <td><input type="password" name="KataLaluanH" required></td>
      </tr>

      <tr>
      <td>telefon</td>
      <td><input type="text" name="TelHakim" required></td>
      </tr>
    
    </table>
      
      <button class="tambah" type="submit">DAFTAR HAKIM BARU</button>

    </form>
</html>