<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
    $buku = cari($_POST['keyword']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kakkoii Book</title>
</head>
<body>
    <div>
        <h3>Daftar Buku</h3>

        <a href="insert.php">Tambah Data Buku</a>
        <br><br>

        <form action="" method="post">
            <input type="text" name="keyword" size="40" placeholder="Masukkan Keyword Pencarian" autocomplete="off" autofocus>
            <button type="submit" name="cari">Cari</button>
        </form>
        <br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>

            <?php if(empty($buku)) : ?>
            <tr>
                <td colspan="4"><p style="color: red; font-style: italic;">Data Buku tidak ditemukan</p></td>
            </tr>
            <?php endif; ?>

            <?php $i = 1; 
            foreach($buku as $bk) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><img src="img/<?= $bk['gambar']; ?>" width="60"></td>
                <td><?= $bk['judul']; ?></td>
                <td>
                    <a href="detail.php?id=<?= $bk['id']; ?>">Lihat Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>