<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/10.jpg'); /* Path to your background image */
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
        $data = mysqli_query($koneksi,"SELECT * FROM petugas WHERE petugas_id = '$id'");
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <form action="aksi/edit_petugas.php" method="post" class="col-6 justify-content-center mx-auto mt-5">
            <div>
                <h2>ayoo...edit petugasnya dulu yukk...</h2>
            </div>
            <input required type="hidden" value="<?php echo $d['petugas_id'] ?>" name="petugas_id">
            <div>
                <label for="nama">Nama Petugas</label>
                <input required type="text" value="<?php echo $d['nama'] ?>" name="nama">
            </div>
            <div>
                <label for="username">Username</label>
                <input required type="text" value="<?php echo $d['username'] ?>" name="username">
            </div> 
            <div>
                <label for="password">Password</label>
                <input required type="password" name="password">
            </div>
            <div>
                <label for="password2">Konfirmasi Password</label>
                <input required type="password" name="password2">
            </div>
            <div>
                <label for="level">Level</label>
                <select name="level" id="">
                    <option value="admin" <?php if($d['level']=='admin') echo 'selected'; ?>>Admin</option>
                    <option value="petugas" <?php if($d['level']=='petugas') echo 'selected'; ?>>Petugas</option>
                </select>
            </div>
            <button type="submit">Edit Petugas</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>
