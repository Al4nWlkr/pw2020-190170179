<?php
require 'functions.php';

// cek tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          document.location.href = 'latihan3.php';
          </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan');
          </script>";
  }
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
    }

    h3 {
      display: flex;
      justify-content: center;
      transform: translate(0, 50%);
      font-family: monotype corsiva;
      font-size: 11mm;
    }

    .box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      padding: 40px;
      background: #4c4c4c;
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgb(0 0 0 / 50%);
      border-radius: 10px;
    }

    ul {
      display: contents;
    }

    li {
      position: relative;
      list-style: none;
    }

    label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      letter-spacing: 1px;
      pointer-events: none;
      transition: .5s;
    }

    input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      letter-spacing: 1px;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }

    input:focus~label,
    input:valid~label {
      top: -20px;
      left: 0;
      color: #03a9f4;
      font-size: 12px;
    }

    button {
      background: transparent;
      border: none;
      outline: none;
      color: #fff;
      background: #03a9f4;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }
  </style>

  <title>Tambah data mahasiswa</title>
</head>

<body>
  <h3>form tambah data mahasiswa</h3>

  <div class="box">
    <form action="" method="POST">
      <ul>
        <li>
          <input type="text" name="Nama" required>
          <label>
            Nama
          </label>
        </li>

        <li>
          <input type="number" name="NIM" required>
          <label>
            NIM
          </label>
        </li>

        <li>
          <input type="text" name="Email" required>
          <label>
            Email
          </label>
        </li>

        <li>
          <input type="text" name="Jurusan" required>
          <label>
            Jurusan
          </label>
        </li>

        <li>
          <button type="submit" name="tambah">Tambah Data</button>
        </li>
      </ul>
    </form>
  </div>
</body>

</html>