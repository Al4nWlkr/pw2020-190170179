<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/detail.css">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <nav>
    <div class="brand">My Campus</div>
  </nav>

  <header align="center">
    <h3>Detail Data Mahasiswa</h3>
  </header>

  <section class="container">
    <ul>
      <li>
        <p style="font-weight: bold;">NIM :</p>
        <p><?= $mhs['NIM']; ?></p>
      </li>

      <li>
        <p style="font-weight: bold;">Nama :</p>
        <p><?= $mhs['Nama']; ?></p>
      </li>

      <li>
        <p style="font-weight: bold;">Email :</p>
        <p><?= $mhs['Email']; ?></p>
      </li>

      <li>
        <p style="font-weight: bold;">Jurusan :</p>
        <p><?= $mhs['Jurusan']; ?></p>
      </li>

      <li>
        <a href="ubah.php?id=<?= $mhs['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('apakah Anda yakin ingin menghapus');">hapus</a>
      </li>

      <li>
        <a href="index.php">kembali ke halaman daftar mahasiswa</a>
      </li>
    </ul>
  </section>
</body>

</html>