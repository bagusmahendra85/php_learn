<?php 
// import functions.php
require "./functions/functions.php";

// query table "list_banjar" dari database
$banjars = query("SELECT nama_banjar FROM list_banjar ORDER BY `list_banjar`.`id` ASC");

// ---- [LOGIC] ----
// cek tombol submit apa sudah pernah di click atau belum
if ( isset($_POST["submit"]) ) {
  
  // cek status
  if ( tambah($_POST) > 0 ) {
    echo 
    "
    <script>
      alert('Data Berhasil Ditambahkan!');
      document.location.href ='index.php';
    </script>
    "
    ;
  } else {
    echo 
    "
    <script>
      alert('Data Gagal Ditambahkan!');
      document.location.href ='index.php';
    </script>
    "
    ;
  }

  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Penduduk</title>
</head>
<style>
  html {
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }
</style>
<body>
  
  <h1>Tambah Data Penduduk</h1>

  <form action="" method="post" id="form_penduduk" enctype="multipart/form-data">
    <table>
      <!-- nama -->
      <tr>
        <td><label for="nik">NIK</label></td>
        <td>:</td>
        <td><input type="text" name="nik" id="nik"></td>
      </tr>
      <!-- nomor kk -->
      <tr>
        <td><label for="nomor_kk">Nomor KK</label></td>
        <td>:</td>
        <td><input type="text" name="nomor_kk" id="nomor_kk"></td>
      </tr>
      <!-- nama -->
      <tr>
        <td><label for="nama">Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama"></td>
      </tr>
      <!-- jenis kelamin -->
      <tr>
        <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
        <td>:</td>
        <td>
          <input type="radio" id="laki-laki" name="jenis_kelamin" value="LAKI-LAKI">
          <label for="laki-laki">Laki-Laki</label>
          <input type="radio" id="perempuan" name="jenis_kelamin" value="PEREMPUAN">
          <label for="perempuan">Perempuan</label>
        </td>
      </tr>
      <!-- banjar -->
      <tr>
        <td><label for="banjar">Banjar</label></td>
        <td>:</td>
        <td>
          <select name="banjar" id="banjar" form="form_penduduk">
              <option> -- Silahkan Pilih -- </option>
            <?php foreach ($banjars as $banjar) : ?>
              <option value=<?= strtoupper($banjar["nama_banjar"]); ?>><?= $banjar["nama_banjar"]; ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <!-- tempat lahir -->
      <tr>
        <td><label for="tempat_lahir">Tempat Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tempat_lahir" id="tempat_lahir"></td>
      </tr>
      <!-- tgl lahir -->
      <tr>
        <td><label for="tgl_lahir">Tanggal Lahir</label></td>
        <td>:</td>
        <td><input type="date" name="tgl_lahir" id="tgl_lahir"></td>
      </tr>
      <!-- email -->
      <tr>
        <td><label for="email">Email</label></td>
        <td>:</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <!-- foto -->
      <tr>
        <td><label for="foto">Upload Foto</label></td>
        <td>:</td>
        <td><input type="file" name="foto" id="foto"></td>
      </tr>
      <!-- submit button -->
      <tr>
        <td></td>
        <td></td>
        <td><button type="submit" name="submit">Tambah Data</button></td>
      </tr>
    </table>
  </form>
  <a href="index.php">Kembali</a>
</body>
</html>