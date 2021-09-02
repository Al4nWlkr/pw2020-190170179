<?php
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

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(209, 207, 207);
    }

    h3 {
      display: flex;
      justify-content: center;
      transform: translate(0, 50%);
      font-family: monotype corsiva;
      font-size: 11mm;
    }

    .search {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      justify-content: center;
    }

    table {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    a {
      color: #000;
      text-decoration: none;
    }

    .button {
      position: absolute;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      line-height: 60px;
      text-transform: uppercase;
      font-family: sans-serif;
      box-sizing: border-box;
      background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
      background-size: 400%;
      border-radius: 30px;
    }

    .button:hover {
      animation: animate 8s linear infinite;
    }

    @keyframes animate {
      0% {
        background-position: 0%;
      }

      100% {
        background-position: 400%;
      }
    }

    .button:before {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      z-index: -1;
      background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
      background-size: 400%;
      border-radius: 40px;
      opacity: 0;
      transition: 0.5s;
    }

    .button:hover:before {
      filter: blur(10px);
      opacity: 1;
      animation: animate 8s linear infinite;
    }
  </style>

  <title>Tabel Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <div class="search">
    <form action="" method="POST">
      <input type="text" name="keyword" size="35" placeholder="Masukkan kata kunci" autocomplete="off">
      <button type="submit" name="cari">cari</button>
    </form>
  </div><br>

  <table border="1" cellpadding="10" cellspacing="0">
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

    <!-- <td colspan="3" align="center"> -->
    <div class="button">
      <a href="tambah.php">tambah data mahasiswa</a>
    </div>
    <!-- </td> -->
  </table>
</body>

</html>