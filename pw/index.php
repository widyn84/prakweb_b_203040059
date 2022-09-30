<?php
require 'functions.php';

$buku = query("SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>KAKKOII BOOK</title>
</head>
<body>
    <div class="container">
        <div class="insertDataDiv">
            <a class="InsertData" href="insert.php?id=<?= $row['id']; ?>" target="_blank"><i class="fa-solid fa-gear">Insert</i></a>
        </div>
        <a href="insert.php" class="insertData" target="_blank"><i class="fa-solid fa-file-circle-plus"></i></a>
        </div>
        <h1 class = text-center>Daftar Buku KAKKOII BOOK</h1>
        <table class="table table-bordered border-warning">
            <tr class = text-center>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Peberbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
                <?php $i = 1; ?>
                <?php foreach ($buku as $bk) : ?>
                    <tr class = text-center>
                        <td><?= $i ?></td>
                        <td><img src="img/<?= $bk["gambar"]; ?>" width="80"></td>
                        <td><?= $bk["judul"]; ?></td>
                        <td><?= $bk["penulis"]; ?></td>
                        <td><?= $bk["penerbit"]; ?></td>
                        <td><?= $bk["tahun_terbit"]; ?></td>
                        <td>
                            <a class="updateData" href="update.php?id=<?= $row['id']; ?>" target="_blank"><i class="fa-solid fa-gear">Update</i></a>
                            <a class="deleteData" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are u Sure?');"><i class="fa-solid fa-trash-can">Delete</i></a>
                        </td>                        
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
        </table>
    </div>
</body>
</html>