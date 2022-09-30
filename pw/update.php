<?php

require 'functions.php';

$id = $_GET['id'];
$buku = query("SELECT * FROM buku WHERE id = $id")[0];

if (isset($_POST['submit'])) {
  if (updateData($_POST) > 0) {
    echo "
      <script>
        alert('Data Berhasil Diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data Gagal Diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data Buku</title>
</head>
<body>
  <div class="container">
    <h1>Update Data Buku</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="idBuku" value="<?= $buku['idBuku']; ?>">
      <input type="hidden" name="imgBukuLama" value="<?= $buku['imgBuku']; ?>">
      <ul>
        <li>
          <label for="judul">Judul Buku</label>
          <input type="text" name="judul" id="judul" required value="<?= $buku['judul']; ?>">
        </li>
        <li>
          <label for="penulis">Penulis</label>
          <input type="text" name="penulis" id="penulis" required value="<?= $buku['penulis']; ?>">
        </li>
        <li>
          <label for="penerbit">Penerbit</label>
          <input type="text" name="penerbit" id="penerbit" required value="<?= $buku['penerbit']; ?>">
        </li>
        <li>
          <?php if ($buku['img'] == '') : ?>
            <label for="img">Gambar Buku</label>
            <input type="file" name="img" id="img" class="img">
          <?php else : ?>
            <img src="img/<?= $buku['img']; ?>" width="96" height="126" class="img-preview">
            <input type="file" name="img" id="img" class="img">
          <?php endif; ?>
        </li>
        <li>
          <button type="submit" name="submit">Update Data</button>
        </li>
      </ul>
    </form>
  </div>
  <script>
    // Preview Image
    const imgBuku = document.querySelector('.img');
    imgBuku.addEventListener('change', function() {
      const imgBuku = document.querySelector('.img');
      const imgPreview = document.querySelector('.img-preview');

      const fileImgBuku = new FileReader();
      fileImgBuku.readAsDataURL(imgBuku.files[0]);

      fileImgBuku.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    });
  </script>
</body>
</html>