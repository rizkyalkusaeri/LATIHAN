<?php
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
</head>

<body>
  <h3>Detail Mahasiswa</h3>

  <ul>
    <li><img src="img/<?= $mahasiswa['foto']; ?>" alt=""></li>
    <li><?= $mahasiswa['nim']; ?></li>
    <li><?php echo $mahasiswa['nama'] ?></li>
  </ul>
</body>

</html>