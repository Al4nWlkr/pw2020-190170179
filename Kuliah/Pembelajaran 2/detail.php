<?php
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
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail</h3>
  <ul>
    <li>Nama : <?= $mhs['Nama']; ?></li>
    <li>NIM : <?= $mhs['NIM']; ?></li>
    <li>Email : <?= $mhs['Email']; ?></li>
    <li>Jurusan : <?= $mhs['Jurusan']; ?></li>
    <li>
      <a href="">ubah</a> | <a href="">hapus</a>
    </li>
    <li>
      <a href="latihan3.php">kembali ke halaman daftar mahasiswa</a>
    </li>
  </ul>
</body>

</html>