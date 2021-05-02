<?php 
// selalu lakukan require/include di awal
require_once('config.php');
require_once('koneksi.php');

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Database Pegawai</title>
  <meta name="description" content="Aplikasi Database Pegawai, CRUD Amat Sangat Serderhana Sekali">
  <meta name="author" content="Nur Hidayat (hidayat365@gmail.com">
</head>

<body>

<?php

// set file yang akan di-include
if (isset($_GET['f']))
    $file = $_GET['f'];
else
    $file = 'pegawai-list';

// include file yang diminta
if ($file && file_exists($file.'.php'))
    require_once($file.'.php');
else
    echo 'File TIDAK Ditemukan!!!!';
?>

</body>
</html>
