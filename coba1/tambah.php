<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';

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

  <form action="" method="POST" enctype="multipart/form-data">
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
          Email :
          <input type="text" name="email" required>
        </label>
      </li>
      <li>
        <Label>
          Jenis Kelamin <br>
          <input type="radio" id="male" name="jk" value="Pria">
          <label for="male">Pria</label>
          <input type="radio" id="female" name="jk" value="Wanita">
          <label for="female">Wanita</label>
        </Label>
      </li>
      <li>
        <label>
          Foto :
          <input type="file" name="foto" class="foto" onchange="previewImage()">
        </label>
        <img src="img/noimage.jpg" style="display: block;" alt="" width="120" class="img-preview">
      </li>
      <li>
        <button type="submit" name="tambah"> Tambah Data </button>
      </li>
    </ul>
  </form>

  <script language="JavaScript" type="text/javascript" src="js/script.js"></script>
</body>

</html>