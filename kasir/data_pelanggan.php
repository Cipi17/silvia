<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/3.jpg'); /* Path to your background image */
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
        <h3>pelanggan</h3>
        <div class="btn-container">
            <a type="button" href="dashboard.php" class="btn btn-danger me-3">Kembali</a>
            <a type="button" href="tambah_pelanggan.php" class="btn btn-success">tambah</a>
        </div>
        <table>
            <tr>
                <th>NO</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>no.telp</th>
                <th> </th>
            </tr>
            <?php 
            include 'aksi/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            while ($d = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['NamaPelanggan'] ?></td>
                <td><?php echo $d['Alamat'] ?></td>
                <td><?php echo $d['NomorTelepon'] ?></td>
                <td>
                    <a type="button" href="detail_pembelian.php?id=<?php echo $d['PelangganID'] ?>" class="btn btn-primary">pembelian</a>
                    <a type="button" href="edit_pelanggan.php?id=<?php echo $d['PelangganID'] ?>" class="btn btn-warning">Edit</a>
                    <a type="button" onclick="confirm('kamu yakin ?')" href="delete_pelanggan.php?id=<?php echo $d['PelangganID'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
