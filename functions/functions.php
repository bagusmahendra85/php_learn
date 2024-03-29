<?php 

require "./config/connections.php";

// CRUD-READ query function
function query($query) {
  
  global $conn;
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;

}

// CRUD-UPDATE functions
function ubah($data) {
  global $conn;
  
  $id = $data["id"];
  $nik = htmlspecialchars($data["nik"]);
  $nomor_kk = htmlspecialchars($data["nomor_kk"]);
  $nama = htmlspecialchars($data["nama"]);
  $jenis_kelamin = $data["jenis_kelamin"];
  $banjar = $data["banjar"];
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tgl_lahir = $data["tgl_lahir"];
  $email = htmlspecialchars($data["email"]);
  $oldFoto = htmlspecialchars($data["oldFoto"]);

  // cek apakah user update foto
  if ( $_FILES["foto"]["error"] === 4 ) {
    $foto = $oldFoto;
  } else {
    $foto = upload();
  }

  $query = "UPDATE penduduk SET 
            nik = '$nik',
            nomor_kk = '$nomor_kk',
            nama = '$nama',
            jenis_kelamin = '$jenis_kelamin',
            banjar = '$banjar',
            tempat_lahir = '$tempat_lahir',
            tgl_lahir = STR_TO_DATE('$tgl_lahir', '%Y-%m-%d'),
            email = '$email',
            foto = '$foto'
            WHERE id = $id"
            ;

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// CRUD-DELETE functions
function hapus($id) {
  global $conn;

  mysqli_query($conn, "DELETE FROM penduduk WHERE id = $id");

  return mysqli_affected_rows($conn);
}

//CRUD-CREATE functions
function tambah($data) {
  global $conn;
  $nik = htmlspecialchars($_POST["nik"]);
  $nomor_kk = htmlspecialchars($_POST["nomor_kk"]);
  $nama = htmlspecialchars($_POST["nama"]);
  $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
  $banjar = htmlspecialchars($_POST["banjar"]);
  $tempat_lahir = htmlspecialchars($_POST["tempat_lahir"]);
  $tgl_lahir = htmlspecialchars($_POST["tgl_lahir"]);
  $email = htmlspecialchars($_POST["email"]);

  $foto = upload();
  if (!$foto) {
    return false;
  }

  // Validate and sanitize $tgl_lahir (date of birth)
  $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));

  $query = "INSERT INTO penduduk VALUES (NULL, '$nik', '$nomor_kk', '$nama', '$jenis_kelamin', '$banjar', '$tempat_lahir', '$tgl_lahir', '$email', '$foto')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


//CRUD-READ SEARCHING FUNCTION
function cari($keyword) {
  $query = "SELECT * FROM penduduk
            WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            nomor_kk LIKE '%$keyword%' OR
            banjar LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
  ";

  return query($query);
}

// upload functions

function upload() {
  
  $namaFile = $_FILES["foto"]["name"];
  $ukuranFIle = $_FILES["foto"]["size"];
  $error = $_FILES["foto"]["error"];
  $tmpDir = $_FILES["foto"]["tmp_name"];
  
  // cek apakah ada gambar yang diupload
  if ($error === 4) {
    echo "
    <script>
      alert('Silahkan pilih gambar terlebih dahulu!');
    </script
    ";
    return false;
  }

  // validasi ekstensi foto
  $allowedFotoExtension = ['jpg', 'jpeg', 'png', 'bmp'];
  $fotoExtension = explode('.', $namaFile);
  $fotoExtension = strtolower(end($fotoExtension));

  if ( !in_array($fotoExtension, $allowedFotoExtension))  {
    echo "
    <script>
      alert('File foto tidak valid!');
    </script
    ";
    return false;
  }

  // validasi size foto
  if ( $ukuranFIle > 2500000 ) {
    echo "
    <script>
      alert('Ukuran file foto tidak boleh melebihi 2MB!');
    </script
    ";
    return false;
  }


  // lolos pengecekan, gambar siap upload
  // generate nama file baru
  $newFileName = uniqid();
  $newFileName .= '.';
  $newFileName .= $fotoExtension;
  move_uploaded_file($tmpDir, './usr/uploaded/foto/' . $newFileName);

  return $newFileName;

}

?>