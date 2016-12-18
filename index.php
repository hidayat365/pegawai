<?php 
require_once('config.php');
require_once('koneksi.php');

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
