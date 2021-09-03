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

  // cek username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {

    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username/Password salah'
  ];
}

// Fungsi untuk registrasi
function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username/password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('Username/Password tidak boleh kosong');
          document.location.href = 'registrasi.php';
          </script>
          ";
    return false;
  }

  //jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
          alert('Username sudah terdaftar');
          document.location.href = 'registrasi.php';
          </script>
          ";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
          alert('konfirmasi password tidak sesuai');
          document.location.href = 'registrasi.php';
          </script>
          ";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
          alert('Password terlalu pendek');
          document.location.href = 'registrasi.php';
          </script>
          ";
    return false;
  }

  // jika username & password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // insert ke tabel user
  $query = "INSERT INTO user VALUES (null, '$username', '$password_baru')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
