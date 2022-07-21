<?php
include('config.php');

if(isset($_POST["NOKPPeserta"])) {
    $NOKPPeserta = $_POST["NOKPPeserta"];
    $NamaPeserta = $_POST["NamaPeserta"];
    $KataLaluan = $_POST["KataLaluan"];
    $Jantina = $_POST["Jantina"];
    $TelPeserta = $_POST["TelPeserta"];
    $Status = $_POST["Status"];

    $sql = "INSERT INTO peserta(NOKPPeserta, NamaPeserta, kataLaluan, Jantina, TelPeserta, Status)
            VALUES ('$NOKPPeserta', '$NamaPeserta', '$KataLaluan', '$Jantina', '$TelPeserta', '$Status')";
    $result = mysqli_query($con, $sql);

    if ($result) 
    {echo "<script>alert('ANDA BERJAYA MENCAPAI KEMENANGAN'); window.location = 'login.php.'</script>";}
    
    else 
    {echo "<script>alert('KEGAGALAN MENANTI ANDA'); window.location = 'index.html'</script>";}
}
