<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    session_start();
    if ($_SESSION['level'] == '') {
        echo "<script>alert('lohh... sepertinya kamu belum login nih. login dulu yukk...'); document.location='./index.php';</script>";
    }
    ?>
</head>

<body>
    <div class="container">
        <h1 class="heading">Dashboard</h1>
        
        <div class="card-container">
            <?php
            include 'aksi/koneksi.php';
            $produk = mysqli_query($koneksi, "SELECT * FROM produk");
            $data_produk = mysqli_num_rows($produk);
            $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            $data_pelanggan = mysqli_num_rows($pelanggan);
            ?>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-basket"></i>
                    <h2><?php echo $data_produk ?></h2>
                    <p>jumlah data produk ada disini yaaa </p>
                    <a href="data_produk.php" class="btn btn-success">produk</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-person-circle"></i>
                    <h2><?php echo $data_pelanggan ?></h2>
                    <p>jumlah data pelanggan ada disini yaaa</p>
                    <a href="data_pelanggan.php" class="btn btn-success">pelanggan</a>
                </div>
            </div>
            <?php
            if ($_SESSION['level'] == 'admin') {
                $petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
                $data_petugas = mysqli_num_rows($petugas);
                echo '<div class="card">
                    <div class="card-body">
                        <i class="bi bi-person-circle"></i>
                        <h2>' . $data_petugas . '</h2>
                        <p>jumlah data petugas ada disini yaaa </p>
                        <a href="data_petugas.php" class="btn btn-success">petugas</a>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="btn-container">
            <a type="button" href="logout.php" class="btn btn-danger me-3">logout</a>
        </div>
    </div>
</body>

</html>
