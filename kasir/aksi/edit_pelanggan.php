
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
 $id = $_POST['PelangganID'];
 $NamaPelanggan = $_POST['NamaPelanggan'];
 $Alamat = $_POST['Alamat'];
 $NomorTelepon = $_POST['NomorTelepon'];

 $result = mysqli_query($koneksi,"UPDATE pelanggan SET NamaPelanggan = '$NamaPelanggan', Alamat = '$Alamat',NomorTelepon = '$NomorTelepon' where PelangganID = '$id' ");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil diedit ');
    document.location='../data_pelanggan.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal diedit ');
        document.location='../data_pelanggan.php';</script>";
    
}?>
</body>
</html>
