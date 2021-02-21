<?php
require '../functions.php';

$mahasiswa = cari($_GET['keyword']);
?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Jenis Kelamin</th>
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
    <td><?= $m['email']; ?></td>
    <td><?= $m['jenis_kelamin']; ?></td>
    <td><img src="img/<?= $m['foto']; ?>" alt="no file"></td>
    <td><a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a><br>
      <a href="hapus.php?id=<?= $m['id']; ?>"
        onclick="return confirm('apakah anda yakin ingin menghapus data?');">Hapus</a><br>
      <a href="ubah.php?id=<?= $m['id']; ?>">Edit</a><br>
    </td>
  </tr>
  <?php endforeach; ?>

</table>