<?php
include('config.php');
include('menupeserta.php');
?>

<?php
if (isset($_POST['update'])) {
    $NOKPPeserta = $data['NOKPPeserta'];
    $NamaPeserta = $data['NamaPeserta'];
    $KataLaluan = $data['KataLaluan'];
    $Jantina = $data['Jantina'];
    $TelPeserta = $data['TelPeserta'];

    //KEMASKINI DATA DALAM JADUAL XAMPP
    $update = "UPDATE peserta SET NamaPeserta = '$NamaPeserta', kataLaluan = '$KataLaluan', Jantina = '$Jantina', TelPeserta = '$Telpeserta' WHERE NOKPPeserta = '$NOKPPeserta'";
    $result = mysqli_query($con, $update);

    //papar mesej jika rekod berjaya dikemaskini
    echo"<script>alert('Kemaskini peserta berjaya');
            window.location = 'infopeserta.php'</script>";
}
?>