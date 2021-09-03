<?php
require '../functions.php';

$mahasiswa = cari($_GET['keyword']);
?>

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