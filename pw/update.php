<?php
require 'functions.php';

// jika tidak ada id di url
if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$bk= query("SELECT * FROM buku WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if(isset($_POST['ubah'])) {
   if  (ubah($_POST) > 0 ) {
       echo "<script>
             alert('Data berhasil diubah!');
             document.location.href = 'index.php';
             </script>";
   } else {
        echo "<script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data buku</title>
</head>
<body>
    <h3>Form Ubah Data Buku</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $bk[0]['id']; ?>">
        <ul>
            <li>
             <label>
                Judul:
                <input type="text" name="judul" autofocus required value="<?= $bk[0]['judul']; ?>">
             </label>
            </li>
            <li>
            <label>
                Penulis:
                <input type="text" name="penulis" required value="<?= $bk[0]['penulis']; ?>">
             </label>            
            </li>
            <li>
            <label>
                Penerbit:
                <input type="text" name="penerbit" required value="<?= $bk[0]['penerbit']; ?>">
             </label>
            </li>
            <li>
            <label>
                Tahun Terbit:
                <input type="text" name="tahun_terbit" required value="<?= $bk[0]['tahun_terbit']; ?>">
             </label>
            </li>
            <li>
            <input type="hidden" name="gambar_lama" value="<?= $bk[0]['gambar']; ?>">
            <label>
                Gambar:
                <input type="file" name="gambar" class="gambar" onchange="previewImage()">
             </label>
                <img src="img/<?= $bk[0]['gambar']; ?>" width="120" style="display: block" class="img-preview">
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data</button>
            </li>
        </ul>
    </form>
<script src="js/script.js"></script>
</body>
</html>