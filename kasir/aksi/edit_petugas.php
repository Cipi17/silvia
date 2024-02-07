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
 $id = $_POST['petugas_id'];
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
 $password = password_hash($password , PASSWORD_DEFAULT);


 $result = mysqli_query($koneksi,"UPDATE petugas SET nama = '$nama', username = '$username', password = '$password' where petugas_id = '$id' ");
if ($result) {
    # code...
    echo "<script>
    alert('yeyyy...data berhasil diedit ');
    document.location='../data_petugas.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh...data gagal diedit ');
        document.location='../data_petugas.php';</script>";
    
}
?>
</body>
</html>

