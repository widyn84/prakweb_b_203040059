<?php

function connection() {
    $connection = mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040059');
    return $connection;
  }

  function query($query) {
    $connection = connection();
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

// Function Insert Data
function insertData($data) {
    $connection = connection();
    $judul = htmlspecialchars($data['judul']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahunterbit = htmlspecialchars($data['tahun_terbit']);
    $gambar = uploadImage();
    if (!$gambar) {
      return false;
    }
  
    $query = "INSERT INTO buku VALUES ('', '$gambar', '$judul', '$penulis', '$penerbit', '$tahunterbit')";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
  }

// Function Upload Image
  function uploadImage() {
    $namaFile = $_FILES['imgBuku']['name'];
    $ukuranFile = $_FILES['imgBuku']['size'];
    $error = $_FILES['imgBuku']['error'];
    $tmpName = $_FILES['imgBuku']['tmp_name'];
  
    if ($error === 4) {
      echo "
        <script>
          alert('Choose Pictures!');
        </script>
      ";
      return false;
    }
  
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "
        <script>
          alert('Not Pictures!');
        </script>
      ";
      return false;
    }
  
    if ($ukuranFile > 1000000) {
      echo "
        <script>
          alert('Too Big!');
        </script>
      ";
      return false;
    }
  
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
  
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
  }

// Function Delete Data
function hapus($id) {
  $conn = koneksi();

  // menghampus gambar di folder img
  $mhs = query("SELECT * FROM buku WHERE id = $id");
  if ($buku['gambar'] != 'nophoto.jpg') {
      unlink('gambar/' .$buku['gambar']);
  }


  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//Function Update
function updateData($data) {
    $connection = connection();
    $id = $data['id'];
    $judul = htmlspecialchars($data['judul']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahunterbit = htmlspecialchars($data['tahun_terbit']);
    $imgBukuLama = htmlspecialchars($data['imgBukuLama']);
    $img = uploadImageOld($imgBukuLama);
    if (!$imgBuku) {
      return false;
    }
  
    $query = "UPDATE buku SET
              judulBuku = '$judul',
              penulis = '$penulis',
              penerbit = '$penerbit',
              tahun_terbit = '$tahunterbit',
              imgBuku = '$imgBuku'
              WHERE idBuku = $idBuku
              ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
  }
?>
