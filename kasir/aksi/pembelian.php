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

$Harga = $_POST['Harga'];
$tanggal = $_POST['tanggal'];
$Stok = $_POST['Stok'];
$PelangganID = $_POST['PelangganID'];
$Jumlah = $_POST['Jumlah'];
$total = $Jumlah * $Harga;

if ($Stok < $Jumlah) {
    # code...
            # code...
            echo "<script>
            alert('yahh... stoknya ga cukup');
            document.location='../pembelian.php?id=$id';</script>";
            return false ;
};

$result = mysqli_query($koneksi,"INSERT INTO penjualan VALUES ('','$tanggal','$total','$PelangganID')");

if ($result) {
    # code...
    //detail_penjualan
    $id_penjualan = mysqli_insert_id($koneksi);
    $detail_penjualan = mysqli_query($koneksi , "INSERT INTO detailpenjualan VALUES ('','$id_penjualan','$id','$Jumlah','$total')  ");

    $new_stock = $Stok - $Jumlah ;
    $update = mysqli_query($koneksi,"UPDATE produk SET Stok = '$new_stock' WHERE ProdukID = '$id' ");


    
// header("Location:ibeda.php");
echo "<script>
alert('yeyyyS...data berhasil ditambah');
document.location='../data_pelanggan.php';</script>";
} ?>
</body>
</html>

