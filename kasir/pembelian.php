<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Pembelian</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('assets/12.jpg'); /* Path to your background image */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: white;
        margin: 0;
        padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: rgba(20, 30, 40, 0.3); /* Adjust the opacity to your liking */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 100px;
            font-size: 18px;
        }

        input {
            width: 50%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            margin-bottom: 10px;
        }

        button {
            width: 50%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #874e4c;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e2b091;
        }

        img {
            display: block;
            margin: 0 auto;
            width: 30%;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
<?php 
session_start();
if ($_SESSION['level'] == '') {
    echo "<script>alert('lohh... sepertinya kamu belum login nih. login dulu yukk...'); document.location='./index.php';</script>";
}
?>
</head>
<body>
<div class="container">
    <?php 
    include 'aksi/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($koneksi,"SELECT * FROM produk where ProdukID = '$id'");
    while ($d = mysqli_fetch_assoc($result)) {
    ?>
    <form action="aksi/pembelian.php" method="post" class="col-6 justify-content-center mx-auto mt-5">
        <div>
            <h2>yukk...tambahkan data pembeliannya</h2>
        </div>
        <div>
            <label for="NamaProduk">Nama Produk : <?php echo $d['NamaProduk'] ?></label>
            <input required type="hidden" name="ProdukID" value="<?php echo $d['ProdukID'] ?>">
        </div>
        <div>
            <label for="NamaProduk">Tanggal Pembelian : <?php echo date("Y-m-d") ?></label>
            <input required type="hidden" name="tanggal" value="<?php echo date("Y-m-d")?>">
        </div>
        <div>
            <label for="Harga">Harga Produk : <?php echo $d['Harga'] ?></label>
            <input required type="hidden" name="Harga" value="<?php echo $d['Harga'] ?>">
        </div> 
        <div>
            <label for="Stok">Stok Produk : <?php echo $d['Stok'] ?></label>
            <input required type="hidden" name="Stok" value="<?php echo $d['Stok'] ?>">
        </div> 
        <div>
            <label for="NamaPelanggan">Nama Pelanggan</label>
            <select name="PelangganID" required>
                <?php 
                include 'aksi/koneksi.php';
                $result = mysqli_query($koneksi, "SELECT PelangganID, NamaPelanggan FROM pelanggan");
                while ($d = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $d['PelangganID'] ?>"><?php echo $d['NamaPelanggan'] ?></option>
                <?php }?>
            </select>
        </div>
        <div>
            <label for="Jumlah">Jumlah</label>
            <input required type="number" name="Jumlah">
        </div> 
        <button type="submit">Tambahkan</button>
    </form>
    <?php } ?>
</div>
</body>
</html>
