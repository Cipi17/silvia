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

    // cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {
        // cek apakah data berhasil diubah atau tidak
        if (ubah($_POST) > 0) {
            echo "
                <script>
                    alert('yeyyy... data berhasil diubah');
                    document.location.href= 'barang.php';
                </script>
            ";
        } else { 
            echo "
                <script>
                    alert('yahhh... data gagal diubah');
                    document.location.href= 'barang.php';
                </script>
            ";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
        <ul>
            <li>
                <label for="nama_barang">Nama Barang : </label>
                <input required type="text" name="nama_barang" id="nama_barang" value="<?= $brg['nama_barang']; ?>">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input required type="text" name="harga" id="harga" value="<?= $brg['harga']; ?>">
            </li>
            <li>
                <label for="stok">Stok : </label>
                <input required type="text" name="stok" id="stok" value="<?= $brg['stok']; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Edit</button>
            </li>
        </ul>
    </form>
</body>
</html>