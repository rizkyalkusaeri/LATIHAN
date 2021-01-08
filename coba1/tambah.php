<?php
require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'latihan1.php';

          </script>";
  } else {
    echo "Data Gagal Ditambahkan";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Tambah Data Mahasiswa</h3>

  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Nim :
          <input type="text" name="nim" required>
        </label>
      </li>
      <li>
        <label>
          Foto :
          <input type="text" name="foto">
        </label>
      </li>
      <li>
        <button type="submit" name="tambah"> Tambah Data </button>
      </li>
    </ul>
  </form>
</body>

</html>