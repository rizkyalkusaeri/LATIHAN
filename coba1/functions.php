<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'mahasiswa');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

//Fungsi Upload
function upload()
{
  $nama_files = $_FILES['foto']['name'];
  $tipe_files = $_FILES['foto']['type'];
  $ukuran = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmp_files = $_FILES['foto']['tmp_name'];

  //Cek Ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    echo "<script>
      alert('Pilih gambar terlebih dahulu');
    </script>";
    return false;
  }

  //Cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_files);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
    alert('Yang anda pilih bukan gambar');
  </script>";
    return false;
  }

  if ($tipe_files != 'image/jpeg' && $tipe_files != 'image/png') {
    echo "<script>
    alert('Yang anda pilih bukan gambar');
  </script>";
    return false;
  }

  if ($ukuran > 5000000) {
    echo "<script>
    alert('Ukuran gambar terlalu besar');
  </script>";
    return false;
  }

  // lolos pengecekan
  //generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_files, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  // $foto = htmlspecialchars($data['foto']);
  $jenisKelamin = $data['jk'];
  $email = htmlspecialchars($data['email']);

  $foto = upload();

  if (!$foto) {
    return false;
  }

  $query = "INSERT INTO mahasiswa VALUES(null, '$nim', '$email','$jenisKelamin','$nama','$foto')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $foto = htmlspecialchars($data['foto']);

  $query = "UPDATE mahasiswa SET 
              nim = '$nim',
              nama = '$nama',
              foto = '$foto'

              WHERE id = $id
              ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM mahasiswa 
              WHERE 
              nama LIKE '%$keyword%' OR
              nim LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM users WHERE username = '$username' && password = '$password'")) {
    //set session
    $_SESSION['login'] = true;

    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username/Password Salah'
    ];
  }
}