<?php
//function connect ke database
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040059');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $judul = htmlspecialchars($data['judul']);
  $penulis = htmlspecialchars($data['penulis']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  //$gambar = $_FILES['gambar']['name'];
  $gambar =  upload();
  $query = "INSERT INTO
            buku
            VALUES
            (null, '$gambar', '$judul', '$penulis', '$penerbit', '$tahun_terbit')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert('pilih gambar terlebih dahulu!');
    //       </script>";
    return 'default.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
                    alert('yang anda pilih bukan gambar');
                  </script>";
    return false;
  }



  // cek ukuran file
  // maksimal 5mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
              alert('Ukuran file kebesaran');
              </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

function ubah($data) {
  $conn = koneksi();

  $id = $data['id'];
  $judul = htmlspecialchars($data['judul']);
  $penulis = htmlspecialchars($data['penulis']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
      return false;
  }

  if ($gambar == 'img/default.jpg') {
      $gambar = $gambar_lama;
  }

  $query = "UPDATE buku SET
              judul = '$judul',
              penulis = '$penulis',
              penerbit = '$penerbit',
              tahun_terbit = '$tahun_terbit',
              gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id) {
  $conn = koneksi();

  // menghapus gambar di folder img
  $bk = query("SELECT * FROM buku WHERE id = $id");
  if ($bk['gambar'] != 'nophoto.jpg') {
      unlink('img/' .$bk['gambar']);
  }


  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
?>