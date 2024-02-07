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
    date_default_timezone_set("Asia/Jakarta");

    // cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (tambahTransaksi($_POST) > 0) {
            echo "
                <script>
                    alert('yeyyy... data sudah berhasil ditambahkan');
                    document.location.href= 'transaksi.php';
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
    <title>Tambah Transaksi</title>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <form action="" method="post">
        <input type="hidden" name="stok" value="<?= $brg['stok']; ?>"> 
        <ul>
            <li>
                <label for="tanggal">Waktu & Tanggal : <?= date('Y-m-d H:i:s'); ?></label>
                <!-- <input required type="datetime-local" name="tanggal" id="tanggal" value="<?= date('Y-m-d\TH:i:s'); ?>"> -->
            </li>
            <!-- <li>
                <label for="barang">Pilih Barang : </label>
                <select name="barang" id="barang" required>
                        <option selected>Pilih Barang</option>
                        <?php 
                        foreach($barang as $row) : 
                        ?>
                            <option value="<?php echo $row['id_barang'] ?>_<?php echo $row['harga'] ?>"><?php echo $row['nama_barang'] ?> <?php echo $row['harga'] ?>, <?php echo $row['stok'] ?></option>
                        <?php endforeach; ?>
                </select>
            </li> -->
            <li>
                <label for="jumlah">Id dan Nama Barang : </label>
                <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>"> 
                <input type="text" name="" disabled value="<?= $brg['id_barang']; ?>"> 
                <input required type="text" disabled name="jumlah" id="jumlah" value="<?= $brg['nama_barang'] ?>">
            </li>
            </li>
            <li>
                <input type="hidden" name="harga" value="<?= $brg['harga']; ?>"> 
                Harga : <?= $brg['harga']  ?>
            </li>
            <li>
                <label for="jumlah">Jumlah : </label>
                <input required type="number" name="jumlah" id="jumlah" min="1">
            </li>
            <li>
    
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>