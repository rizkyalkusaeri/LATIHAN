<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

require 'functions.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';

          </script>";
} else {
  echo "Data Gagal Ditambahkan";
}