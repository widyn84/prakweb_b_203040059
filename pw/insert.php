<?php

require 'functions.php';

if (isset($_POST['submit'])) {
  if (insertData($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = '/index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = '/index.php';
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
  <title>Insert Data Buku</title>
</head>
<body>
  <h1>Insert Data Buku</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="gambar">Gambar</label>
        <input type="file" name="imgBuku" id="imgBuku" onchange="previewImage()">
        <img src="/img/default.jpg" width="96" height="126" class="img-preview">
      </li>
      <li>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>
      </li>
      <li>
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis" required>
      </li>
      <li>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" required>
      </li>
      <li>
        <label for="penerbit">Tahun Terbit</label>
        <input type="text" name="tahun_terbit" id="tahun_terbit " required>
      </li>
      <li>
        <button type="submit" name="submit">Insert Data</button>
      </li>
    </ul>
  </form>
  <script>
    // Preview Image
    function previewImage() {
      const imgBuku = document.querySelector('#imgBuku');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imgBuku.files[0]);

      oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
</body>
</html>