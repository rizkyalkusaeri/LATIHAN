<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah data mahasiswa</a>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $m['nim']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><img src="img/<?= $m['foto']; ?>" alt="no file"></td>
      <td><a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a></td>
    </tr>
    <?php endforeach; ?>

  </table>
</body>

</html>