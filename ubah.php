<?php 
// import functions.php
require "./functions/functions.php";

// query table "list_banjar" dari database
$banjars = query("SELECT nama_banjar FROM list_banjar ORDER BY `list_banjar`.`id` ASC");

//ambil id dari URL
$id = $_GET["id"];

//query data
$data = query("SELECT * FROM penduduk WHERE id = $id")[0];

// ---- [LOGIC] ----
// cek tombol submit apa sudah pernah di click atau belum
if ( isset($_POST["submit"]) ) {
  // cek status
  if ( ubah($_POST) > 0 ) {
    echo 
    "
    <script>
      alert('Data Berhasil Dirubah!');
      document.location.href ='index.php';
    </script>
    "
    ;
  } else {
    echo 
    // "
    // <script>
    //   alert('Data Gagal Dirubah!');
    //   document.location.href ='index.php';
    // </script>
    // "
    mysqli_error($conn);
    ;
  }

  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Penduduk</title>
</head>
<style>
  html {
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }
</style>
<body>
  
  <h1>Ubah Data Penduduk</h1>

  <form action="" method="post" id="form_penduduk">
    <table>
      <!-- ID HIDDEN FIELD -->
      <input type="hidden" name="id" value="<?= $data["id"] ?>">
      <!-- NIK FIELD -->
      <tr>
        <td><label for="nik">NIK</label></td>
        <td>:</td>
        <td><input type="text" name="nik" id="nik" value="<?= $data["nik"]; ?>"></td>
      </tr>
      <!-- NOMOR KK FIELD -->
      <tr>
        <td><label for="nomor_kk">Nomor KK</label></td>
        <td>:</td>
        <td><input type="text" name="nomor_kk" id="nomor_kk" value="<?= $data["nomor_kk"]; ?>"></td>
      </tr>
      <!-- NAMA FIELD -->
      <tr>
        <td><label for="nama">Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama" value="<?= $data["nama"]; ?>"></td>
      </tr>
      <!-- JENIS KELAMIN FIELD -->
      <tr>
        <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
        <td>:</td>
        <td>
          <input type="radio" id="laki-laki" name="jenis_kelamin" value="LAKI-LAKI" <?= ($data["jenis_kelamin"] == "LAKI-LAKI") ? "checked" : "" ?>>
          <label for="laki-laki">Laki-Laki</label>
          <input type="radio" id="perempuan" name="jenis_kelamin" value="PEREMPUAN" <?= ($data["jenis_kelamin"] == "PEREMPUAN") ? "checked" : "" ?>>
          <label for="perempuan">Perempuan</label>
        </td>
      </tr>
      <!-- BANJAR FIELD -->
      <tr>
        <td><label for="banjar">Banjar</label></td>
        <td>:</td>
        <td>
          <select name="banjar" id="banjar" form="form_penduduk">
              <option> -- Silahkan Pilih -- </option>
            <?php foreach ($banjars as $banjar) : ?>
              <option value=<?= strtoupper($banjar["nama_banjar"]); ?> <?= $data["banjar"] == strtoupper($banjar["nama_banjar"]) ? "selected" : "" ?>>
                <?= $banjar["nama_banjar"]; ?>
              </option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <!-- TEMPAT LAHIR FIELD -->
      <tr>
        <td><label for="tempat_lahir">Tempat Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $data["tempat_lahir"]; ?>"></td>
      </tr>
      <!-- TANGGAL LAHIR FIELD -->
      <tr>
        <td><label for="tgl_lahir">Tanggal Lahir</label></td>
        <td>:</td>
        <td><input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $data["tgl_lahir"]; ?>"></td>
      </tr>
      <!-- EMAIL FIELD -->
      <tr>
        <td><label for="email">Email</label></td>
        <td>:</td>
        <td><input type="text" name="email" id="email" value="<?= $data["email"]; ?>"></td>
      </tr>
      <!-- SUBMIT BUTTON -->
      <tr>
        <td></td>
        <td></td>
        <td><button type="submit" name="submit">Ubah Data</button></td>
      </tr>
    </table>
  </form>
  <!-- BACK TO INDEX.PHP -->
  <a href="index.php">Kembali</a>
</body>
</html>