<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: rgba(15,25,30,255);">
    
<?php
include 'koneksi.php';

 $NamaPelanggan = $_POST['NamaPelanggan'];
 $Alamat = $_POST['Alamat'];
 $NomorTelepon = $_POST['NomorTelepon'];

 $result = mysqli_query($koneksi,"INSERT INTO pelanggan VALUES ('','$NamaPelanggan','$Alamat','$NomorTelepon')");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil ditambah ');
    document.location='../data_pelanggan.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal ditambah ');
        document.location='../data_pelanggan.php';</script>";
    
}?>
</body>
</html>

