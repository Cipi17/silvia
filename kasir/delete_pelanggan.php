<?php
include 'aksi/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi,"DELETE FROM pelanggan where PelangganID = '$id'");

if ($result) {
    # code...
    echo "<script>
    alert('yeyyy... data sudah berhasil dihapus ');
    document.location='./data_pelanggan.php';</script>";
}else {
        # code...
        echo "<script>
        alert('yahh... data gagal dihapus ');
        document.location='./data_pelanggan.php';</script>";
    
}