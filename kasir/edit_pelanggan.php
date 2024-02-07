<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/9.jpg'); /* Path to your background image */
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
        $data = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE PelangganID = '$id'");
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <form action="aksi/edit_pelanggan.php" method="post" class="col-6 justify-content-center mx-auto mt-5">
            <div>
                <h2>ayoo...edit pelanggannya dulu yukk...</h2>
            </div>
            <input required type="hidden" value="<?php echo $d['PelangganID'] ?>" name="PelangganID">
            <div>
                <label for="NamaPelanggan">Nama Pelanggan</label>
                <input required type="text" value="<?php echo $d['NamaPelanggan'] ?>" name="NamaPelanggan" id="NamaPelanggan">
            </div>
            <div>
                <label for="Alamat">Alamat</label>
                <input required type="text" value="<?php echo $d['Alamat'] ?>" name="Alamat" id="Alamat">
            </div> 
            <div>
                <label for="NomorTelepon">NomorTelepon</label>
                <input required type="number" value="<?php echo $d['NomorTelepon'] ?>" name="NomorTelepon" id="NomorTelepon">
            </div>
            <button type="submit">Edit</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>
