<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php'; 
    $barang = query("SELECT * FROM barang ORDER BY id_barang DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>barang</title>
</head>
<body>
    <h1>daftar barang</h1>
    <a href="tambah.php">Tambah</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th> </th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($barang as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama_barang"]; ?></td>
            <td><?= $row["harga"]; ?></td>
            <td><?= $row["stok"]; ?></td>
            <td>
                <a href="tambah-transaksi.php?id=<?= $row['id_barang']; ?>">Beli</a> |
                <a href="barang-details.php?id=<?= $row['id_barang']; ?>">Detail</a> |
                <a href="ubah.php?id=<?= $row['id_barang']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('kamu yakin?');">Delete</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
