<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/13.jpg'); /* Path to your background image */
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
    if ($_SESSION['level'] !== 'admin') {
        echo "<script>alert('lohh... sepertinya kamu tidak memiliki akses ke halaman ini'); document.location='./index.php';</script>";
    }
    ?>
</head>
<body>
    <div class="container">
        <form action="aksi/registrasi.php" method="post" class="col-6 justify-content-center mx-auto">
            <h2>Ayo... daftarkan akun kamu sekarang</h2>
            <div>
                <label for="nama">Nama Petugas</label>
                <input required type="text" name="nama" id="nama">
            </div>
            <div>
                <label for="username">Username</label>
                <input required type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input required type="password" name="password" id="password">
            </div> 
            <div>
                <label for="password2">Konfirmasi Password</label>
                <input required type="password" name="password2" id="password2">
            </div>
            <div>
                <label for="level">Level</label>
                <select name="level" required id="level">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div> 
            <button type="submit">Registrasi</button>
        </form>
    </div>
</body>
</html>
