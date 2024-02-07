<?php  
  //import functions.php
  require "./functions/functions.php";
  
  // store database query from table_penduduk and put on a var
  $bmdb = query("SELECT * FROM penduduk");

  // search button pressed
  if ( isset($_POST["cari"]) ) {
    $bmdb = cari($_POST["keyword"]);
  }

; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <style>
    html {
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }

  </style>
</head>
<body>
  <h1>Data Penduduk</h1>
  
  <a href="tambah.php">Tambah Data Penduduk</a>
  <br>
  <br>
  <form action="" method="post">
    <input type="text" name="keyword" placeholder="silahkan masukkan keyword.." autocomplete="off" autofocus size="40">
    <button type="submit" name="cari">Cari</button>
  </form>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Foto</th>
      <th>NIK</th>
      <th>Nomor KK</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Banjar</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Email</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($bmdb as $row) : ?>
    <tr>
      <!-- index -->
      <td><?= $i; ?></td>
      <!-- action -->
      <td>
        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | 
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Konfirmasi Hapus Data')">Hapus</a>
      </td>
      <!-- foto -->
      <td><img src="img/female_avatar.jpeg" alt=""></td>
      <!-- nik -->
      <td><?= $row["nik"]; ?></td>
      <!-- nomor_kk -->
      <td><?= $row["nomor_kk"]; ?></td>
      <!-- nama -->
      <td><?= $row["nama"]; ?></td>
      <!-- jenis_kelamin -->
      <td><?= $row["jenis_kelamin"]; ?></td>
      <!-- banjar -->
      <td><?= $row["banjar"]; ?></td>
      <!-- tempat_lahir -->
      <td><?= $row["tempat_lahir"]; ?></td>
      <!-- tgl_lahir -->
      <td><?= $row["tgl_lahir"]; ?></td>
      <!-- email -->
      <td><?= $row["email"] ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>
</html>