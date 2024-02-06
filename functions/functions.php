<?php 

require "./config/connections.php";

// CRUD-READ function
function query($query) {
  
  global $conn;
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;

}

// CRUD-CREATE functions
function tambah($data) {
  global $conn;
  $nik = $_POST["nik"];
  $nomor_kk = $_POST["nomor_kk"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $banjar = $_POST["banjar"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $tgl_lahir = $_POST["tgl_lahir"];
  $email = $_POST["email"];

  $query = "INSERT INTO penduduk VALUES (NULL, '$nik', '$nomor_kk', '$nama', '$jenis_kelamin', '$banjar', '$tempat_lahir', '$tgl_lahir', '$email', NULL)";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// CRUD-DELETE functions
function hapus($id) {
  global $conn;

  mysqli_query($conn, "DELETE FROM penduduk WHERE id = $id");

  return mysqli_affected_rows($conn);
}


?>