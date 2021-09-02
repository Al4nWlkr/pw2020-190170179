<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari ditekan
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>Tabel Mahasiswa</title>
</head>

<body>
  <a href="logout.php">Log Out</a>
  <h3>Daftar Mahasiswa</h3>

  <div class="search">
    <form action="" method="POST">
      <input type="text" name="keyword" size="35" placeholder="Masukkan kata kunci" autocomplete="off">
      <button type="submit" name="cari">cari</button>
    </form>
  </div><br>

  <div class="button">
    <a href="tambah.php">tambah data mahasiswa</a>
  </div>

  <table border="1" align="center" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="3">
          <p style="color: red;">DATA MAHASISWA TIDAK DITEMUKAN</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $mhs['Nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail</a>
        </td>
      </tr>

    <?php endforeach; ?>

  </table>
</body>

</html>