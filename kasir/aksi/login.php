<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: rgba(15,25,30,255);">
    
<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM petugas WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if ($data = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if ($_SESSION['level'] == 'admin') {
            header("Location:../dashboard.php");
        } elseif ($_SESSION['level'] == 'petugas') {
            header("Location:../dashboard.php");
        }
    } else {
        echo "<script>
        alert('password salah! silakan dicoba lagi yakk hehe...');
        document.location='../index.php';</script>";
    }
} else {
    echo "<script>
    alert('username tidak ada !');
    document.location='../index.php';</script>";
} ?>
</body>
</html>

