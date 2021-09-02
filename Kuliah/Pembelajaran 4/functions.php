<?php

// Koneksi ke db
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_190170179');
}

// query dari db
function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Fungsi untuk menambahkan data
function tambah($data)
{
  $conn = koneksi();

  $nim = htmlspecialchars($data['NIM']);
  $nama = htmlspecialchars($data['Nama']);
  $email = htmlspecialchars($data['Email']);
  $jurusan = htmlspecialchars($data['Jurusan']);
  $query = "INSERT INTO mahasiswa VALUES (null, '$nim', '$nama', '$email', '$jurusan')";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data
function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// Fungsi untuk mengubah data
function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nim = htmlspecialchars($data['NIM']);
  $nama = htmlspecialchars($data['Nama']);
  $email = htmlspecialchars($data['Email']);
  $jurusan = htmlspecialchars($data['Jurusan']);
  $query = "UPDATE mahasiswa SET 
            nim = '$nim',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan'
            WHERE id = $id
            ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// Fungsi untuk pencarian
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa WHERE 
            Nama LIKE '%$keyword%' OR 
            NIM LIKE '%$keyword%'
            ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Fungsi untuk login
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {
    // set session
    $_SESSION['login'] = true;

    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username/Password salah'
    ];
  }
}
