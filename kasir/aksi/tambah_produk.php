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

 $NamaProduk = $_POST['NamaProduk'];
 $Harga = $_POST['Harga'];
 $Stok = $_POST['Stok'];

 $result = mysqli_query($koneksi,"INSERT INTO produk VALUES ('','$NamaProduk','$Harga','$Stok')");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil ditambah ');
    document.location='../data_produk.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal ditambah ');
        document.location='../data_produk.php';</script>";
    
}
?>
</body>
</html>
