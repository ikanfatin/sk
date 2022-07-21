<!--fail ini menghubungkan pangkalan data phpMYSQL dengan semua fail php yang berkaitan-->
<?php

//membuat sambungan ke xampp
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('sambungan kepada pangkalan Data Gagal'.mysqli_connect_error());
}

//pilih pangkalan data dalam XAMPP
mysqli_select_db($con,"ememanah");
?>
