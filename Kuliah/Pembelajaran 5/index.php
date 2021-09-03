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
  <nav>
    <div class="brand">My Campus</div>

    <div class="search">
      <form action="" method="POST">
        <input type="text" name="keyword" size="35" placeholder="Masukkan kata kunci" autocomplete="off" class="keyword">
        <button type="submit" name="cari" class="tombol-cari">cari</button>
      </form>
    </div>

    <div class="button">
      <a href="tambah.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Tambah Data Mahasiswa
      </a>

      <a href="logout.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Log Out
      </a>
    </div>
  </nav>

  <h3>Daftar Mahasiswa</h3>

  <br>

  <div class="container">
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
  </div>

  <script src="js/script.js"></script>
</body>

</html>