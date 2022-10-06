<?php
//function connect ke database
function koneksi() {
  return mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040059');
}

function query($query) {
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data) {
  $conn = koneksi();

  $judul = htmlspecialchars($data['judul']);
  $penulis = htmlspecialchars($data['penulis']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
            buku
            VALUES
            (null, '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$gambar')";
  mysqli_query($conn, $query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
?>