<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
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
  <br><br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="Masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari"> Cari </button>
  </form>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="5">
        <p style="color: red; font-style: italic;">Data Mahasiswa Tidak Ditemukan</p>
      </td>
    </tr>
    <?php endif; ?>
    <?php
    $no = 1;
    foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $m['nim']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><img src="img/<?= $m['foto']; ?>" alt="no file"></td>
      <td><a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a><br>
        <a href="hapus.php?id=<?= $m['id']; ?>"
          onclick="return confirm('apakah anda yakin ingin menghapus data?');">Hapus</a><br>
        <a href="ubah.php?id=<?= $m['id']; ?>">Edit</a><br>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>
</body>

</html>