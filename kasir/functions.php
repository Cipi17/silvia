<?php
 // koneksi ke database
 $conn = mysqli_connect("localhost", "root", "", "kasir");
 
 function query($query){
     global $conn;
     $result = mysqli_query($conn, $query);
     $rows = [];
     while( $row = mysqli_fetch_assoc($result)){
         $rows[] = $row;
     }
     return $rows;
 }

 //  tambah data barang
 function tambah($data){
      global $conn;
      // ambil data dari tiap elemen dari form
      $nama_barang =  htmlspecialchars($data["nama_barang"]);
      $harga = htmlspecialchars($data["harga"]);
      $stok = htmlspecialchars($data["stok"]);

      //  query insert data
      $query = "INSERT INTO kasir_barang VALUES ('', '$nama_barang', '$harga', '$stok')";
      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
 }

 //  tambah data transaksi
 function tambahTransaksi($data){
    global $conn;
    // ambil data dari tiap elemen dari form
    $tanggal = date('Y-m-d H:i:s');
    $id_barang = $data["id_barang"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $jumlah = htmlspecialchars($data["jumlah"]);
    $total = $harga * $jumlah;
    
    // cek apakah stok tersedia
    if($stok < $jumlah){
        echo "<script>alert('yahhh... stoknya tidak cukup')</script>";
        return false;
    }

    //  query insert data
    $query = "INSERT INTO kasir_transaksi VALUES ('', '$tanggal', '$id_barang', '$jumlah', '$total')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 }

 //  hapus data barang
 function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM kasir_barang WHERE id_barang = $id");

    return mysqli_affected_rows($conn);
 }

 //  ubah data barang
 function ubah($data){
    global $conn;
    // ambil data dari tiap elemen dari form
    $id = $data["id_barang"];
    $nama_barang =  htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);


    //  query insert data
    $query = "UPDATE kasir_barang SET nama_barang = '$nama_barang', harga = '$harga', stok = '$stok' WHERE id_barang = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 }

 //  registrasi
 function registrasi($data){
     global $conn;

     $username = strtolower(stripslashes($data["username"]));
     $password = mysqli_real_escape_string($conn, $data["password"]);
     $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //  cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('usernamenya sudah ada yaa...');
              </script>";
        return false;
    }

     //  cek konfirmasi password
     if ($password !== $password2) {
         echo "<script>
                alert('ayo coba lagi! passwordnya tidak sesuai');
               </script>";
         return false;
     }

    //  enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
     
    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
 }
?>