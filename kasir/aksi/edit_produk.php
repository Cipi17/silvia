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
 $id = $_POST['ProdukID'];
 $NamaProduk = $_POST['NamaProduk'];
 $Harga = $_POST['Harga'];
 $Stok = $_POST['Stok'];

 $result = mysqli_query($koneksi,"UPDATE produk SET NamaProduk = '$NamaProduk', Harga = '$Harga',Stok = '$Stok' where ProdukID = '$id' ");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil diedit ');
    document.location='../data_produk.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal diedit ');
        document.location='../data_produk.php';</script>";
    
}
?>
</body>
</html>

