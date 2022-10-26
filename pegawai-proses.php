<?php
require_once('config.php');
require_once('koneksi.php');

// prepare data to process
$id = htmlspecialchars($_POST['id']??0);
$nip = htmlspecialchars($_POST['nip']??'');
$nama = htmlspecialchars($_POST['nama']??'');
$alamat = htmlspecialchars($_POST['alamat']??'');
$tmplhr = htmlspecialchars($_POST['tempat_lahir']??'');
$tgllhr = htmlspecialchars($_POST['tanggal_lahir']??'');

/**
 * Proses tambah pegawai baru
 */
if ($_POST['action']=='create') {
    $sql = "
        insert into 
        pegawai ( nip,nama,alamat,tempat_lahir,tanggal_lahir ) 
        values ( ?, ?, ?, ?, ?) 
    ";

    // prepare sql statement
    $stmt = mysqli_prepare($db_conn, $sql);
    // pengecekan
    if (!$stmt) die('Prepare Query GAGAL: ' . mysqli_error($db_conn));
    // bind parameter to prevent sql injection
    mysqli_stmt_bind_param($stmt, 'sssss', $nip, $nama, $alamat, $tmplhr, $tgllhr);
    // execute sql statement
    $result = mysqli_stmt_execute($stmt);
    // clean up memory
    mysqli_stmt_close($stmt);
    // give feedback to user
    if ($result)
        print 'Insert Data Pegawai BERHASIL!';
    else
        print 'Insert Data Pegawai GAGAL!';
}

/**
 * Proses edit pegawai pegawai lama
 */
if ($_POST['action']=='edit') {
    $sql = "
        update pegawai 
        set nip = ?,
            nama = ?,
            alamat = ?,
            tempat_lahir = ?,
            tanggal_lahir = ?
        where id = ?
    ";
    // prepare sql statement
    $stmt = mysqli_prepare($db_conn, $sql);
    // bind parameter to prevent sql injection
    mysqli_stmt_bind_param($stmt, 'sssssd', $nip, $nama, $alamat, $tmplhr, $tgllhr, $id);
    // execute sql statement
    $result = mysqli_stmt_execute($stmt);
    // clean up memory
    mysqli_stmt_close($stmt);
    // give feedback to user
    if ($result)
        print 'Update Data Pegawai BERHASIL!';
    else
        print 'Update Data Pegawai GAGAL!';
}

/**
 * Proses delete pegawai pegawai lama
 */
if ($_POST['action']=='delete') {
    $sql = "
        delete from pegawai 
        where id = ?
    ";
    // prepare sql statement
    $stmt = mysqli_prepare($db_conn, $sql);
    // bind parameter to prevent sql injection
    mysqli_stmt_bind_param($stmt, 'd', $id);
    // execute sql statement
    $result = mysqli_stmt_execute($stmt);
    // clean up memory
    mysqli_stmt_close($stmt);
    // give feedback to user
    if ($result)
        print 'Delete Data Pegawai BERHASIL!';
    else
        print 'Delete Data Pegawai GAGAL!';
}

?>

<br />
<br />
<a href="index.php?f=pegawai-list">Kembali ke Daftar Pegawai</a>
