<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

require 'functions.php';

$id = $_GET['id'];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id =$id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  img {
    width: 200px;
  }
  </style>
</head>

<body>
  <h3>Detail Mahasiswa</h3>

  <ul>
    <li><img src="img/<?= $mahasiswa['foto']; ?>" alt=""></li>
    <li><?= $mahasiswa['nim']; ?></li>
    <li><?php echo $mahasiswa['nama'] ?></li>
    <li><?= $mahasiswa['email']; ?></li>
    <li><?= $mahasiswa['jenis_kelamin']; ?></li>
  </ul>
</body>

</html>