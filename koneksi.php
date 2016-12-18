<?php

// koneksi database
$db_conn = mysqli_connect($db_host.':'.$db_port,$db_user,$db_pass);
if (!$db_conn) die('Koneksi Database GAGAL: ' . mysqli_error());

// set database aktif
$db_active = mysqli_select_db($db_conn,$db_name);
if (!$db_active) die ('Pengaktifan Database "'.$db_name.'" GAGAL: ' . mysqli_error($db_conn));

?>
