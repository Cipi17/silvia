<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    // cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('yeyyy... data berhasil ditambahkan');
                    document.location.href= 'barang.php';
                </script>
            ";
        } else { 
            echo "
                <script>
                    alert('yahhh... data gagal ditambahkan');
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
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_barang">Nama Barang : </label>
                <input required type="text" name="nama_barang" id="nama_barang">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input required type="text" name="harga" id="harga">
            </li>
            <li>
                <label for="stok">Stok : </label>
                <input required type="text" name="stok" id="stok">
            </li>
            <li>
                <button type="submit" name="submit">Tambahkan</button>
            </li>
        </ul>
    </form>
</body>
</html>