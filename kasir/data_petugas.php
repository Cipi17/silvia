<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/4.jpg'); /* Path to your background image */
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
    if ($_SESSION['level'] !== 'admin') {
        echo "<script>alert('lohh... sepertinya kamu tidak memiliki akses ke halaman ini'); document.location='./index.php';</script>";
    }
    ?>
</head>
<body>
    <div class="container mt-5">
        <h3>petugas</h3>
        <div class="btn-container">
            <a type="button" href="dashboard.php" class="btn btn-danger">kembali</a>
            <a type="button" href="registrasi.php" class="btn btn-success">tambah</a>
        </div>
        <table>
            <tr>
                <th>NO</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th> </th>
            </tr>
            <?php 
            include 'aksi/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM petugas");
            while ($d = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['username'] ?></td>
                <td><?php echo $d['level'] ?></td>
                <td>
                    <a type="button" href="edit_petugas.php?id=<?php echo $d['petugas_id'] ?>" class="btn btn-warning">Edit</a>
                    <a type="button" onclick="confirm('kamu yakin ?')" href="delete_petugas.php?id=<?php echo $d['petugas_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
