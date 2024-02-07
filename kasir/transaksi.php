<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php'; 
    $transaksi = query("SELECT * FROM detail_penjualan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Penjualan</title>
</head>
<body>
    <h1>Detail Penjualan</h1>
    <a href="barang.php">Tambah</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>id detail</th>
            <th>id penjualan</th>
            <th>id barang</th>
            <th>jumlah</th>
            <th>sub total</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($transaksi as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["id_penjualan"]; ?></td>
            <td><?= $row["id_barang"]; ?></td>
            <td><?= $row["jumlah"]; ?></td>
            <td><?= $row["sub_total"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
