<?php
require 'functions.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

$m = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php';

          </script>";
  } else {
    echo "Data Gagal Diubahkan";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ubah Data Mahasiswa</title>
</head>

<body>
  <h3>ubah Data Mahasiswa</h3>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $m['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nim :
          <input type="text" name="nim" required value="<?= $m['nim']; ?>">
        </label>
      </li>
      <li>
        <label>
          Foto :
          <input type="text" name="foto" value="<?= $m['foto']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah"> ubah Data </button>
      </li>
    </ul>
  </form>
</body>

</html>