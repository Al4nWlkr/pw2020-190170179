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
  <script src="https://kit.fontawesome.com/a1cf9facd4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">

  <title>Tabel Mahasiswa</title>
</head>

<body>
  <nav>
    <div class="brand">My Campus</div>

    <div class="search">
      <form action="" method="POST" class="search-box">
        <input type="text" name="keyword" size="35" placeholder="Masukkan kata kunci" autocomplete="off" class="keyword">
        <div class="tombol"><i class="fas fa-search"></i></div>
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

  <!-- Background -->
  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <div class="box">
      <div class="square" style="--i:0"></div>
      <div class="square" style="--i:1"></div>
      <div class="square" style="--i:2"></div>
      <div class="square" style="--i:3"></div>
      <div class="square" style="--i:4"></div>
      <div class="container">
        <div class="form">
          <header>
            <h3>Daftar Mahasiswa</h3>
          </header>

          <br>

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
                <td class="number"><?= $i++; ?></td>
                <td><?= $mhs['Nama']; ?></td>
                <td>
                  <a href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- End Background -->

  <footer>
    <div class="icon" align="left">
      <a href="https://youtube.com" target="_blank" class="sosmed"><i class="fab fa-youtube"></i></a>
      <a href="https://instagram.com" target="_blank" class="sosmed"><i class="fab fa-instagram"></i></a>
      <a href="https://twitter.com" target="_blank" class="sosmed"><i class="fab fa-twitter"></i></a>
      <a href="https://facebook.com" target="_blank" class="sosmed"><i class="fab fa-facebook-f"></i></a>
    </div>
    <p>&copy; Developed By Bryan Kazuro</p>
  </footer>

  <script src="js/script.js"></script>
</body>

</html>