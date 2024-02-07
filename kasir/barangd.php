<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php'; 
     // ambil data di url
     $id = $_GET["id"];
    
     // query data berdasarkan id
     $brg = query("SELECT * FROM barang WHERE id_barang = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barang</title>
</head>
<body>
    <h1>Barang</h1>
    <ul>
        <li>Nama Barang :<?= $brg["nama_barang"]; ?></li>
        <li>Harga Barang :<?= $brg["harga"]; ?></li>
        <li>Stok Barang :<?= $brg["stok"]; ?></li>
    </ul>
    <a href="barang.php">Kembali ke barang</a>
</body>
</html>
