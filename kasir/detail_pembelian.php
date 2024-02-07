<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/6.jpg'); /* Path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: rgba(26, 38, 49, 0.2); /* Adjust the opacity to your liking */
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            background-color: #874e4c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #e2b091;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #ab3e16;
            color: white;
        }

        tr:hover {
            background-color: #eabcac;
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
    <div class="container mt-5">
        <h3>Detail Pembelian</h3>
        
        <table>
            <tr>
                <th>NO</th>
                <th>Tanggal Penjualan</th>
                <th>Id Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php 
            include 'aksi/koneksi.php';
            $no = 1;
            $id = $_GET['id'];
            $detail =  "SELECT penjualan.TanggalPenjualan ,  detailpenjualan.ProdukID, penjualan.TotalHarga , detailpenjualan.JumlahProduk 
            FROM penjualan 
            INNER JOIN detailpenjualan on penjualan.PenjualanID = detailpenjualan.PenjualanID
            WHERE penjualan.PelangganID = '$id'";
            $data = mysqli_query($koneksi,$detail);
            while ($d = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['TanggalPenjualan'] ?></td>
                <td><?php echo $d['ProdukID'] ?></td>
                <td><?php echo $d['JumlahProduk'] ?></td>
                <td><?php echo $d['TotalHarga'] ?></td>
            </tr>
            <?php } ?>
        </table>
        <div class="btn-container">
            <a href="dashboard.php" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</body>
</html>
