<?php
if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$bk = query("SELECT * FROM buku WHERE  id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
</head>
<body>
    <h3>Detail Buku</h3>
    <ul>
        <li><img src="img/<?= $bk[0]['gambar']; ?>" width="250"></li>
        <li>Judul: <?= $bk[0]['judul']; ?></li>
        <li>Penulis: <?= $bk[0]['penulis']; ?></li>
        <li>Penerbit: <?= $bk[0]['penerbit']; ?></li>
        <li>Tahun Terbit: <?= $bk[0]['tahun_terbit']; ?></li>
        <li><a href="update.php?id=<?= $bk[0]['id']; ?>">Ubah</a> | <a href="delete.php?id=<?= $bk[0]['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a></li>
        <li><a href="index.php">Kembali ke Daftar Buku</a></li>

    </ul>
</body>
</html>