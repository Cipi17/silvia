<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: rgba(15,25,30,255);">
<?php
include 'koneksi.php';

 $nama = $_POST['nama'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $password2 = $_POST['password2'];
 $level = $_POST['level'];

 //kalau pw yang di input beda
 if ($password !== $password2) {
    # code...
    echo "pw beda";
 }
//cek username
$cek = mysqli_query($koneksi,"SELECT * FROM petugas where username = '$username'");
$login = mysqli_fetch_assoc($cek);

if ($login) {
    # code...
    echo "datanya sudah terdaftar ya";
}
 $password = password_hash($password , PASSWORD_DEFAULT);
//eksekusi query
 $result = mysqli_query($koneksi,"INSERT INTO petugas VALUES ('','$nama','$username','$password','$level')");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil ditambah ');
    document.location='../index.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal ditambah ');
        document.location='../index.php';</script>";
    
}?>
</body>
</html>

