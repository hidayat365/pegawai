<?php
require_once('config.php');
require_once('koneksi.php');

// tambah pegawai
if ($_POST['action']=='create') {
    $sql = "
        insert into 
        pegawai ( nip,nama,alamat,tempat_lahir,tanggal_lahir ) 
        values (
            '".htmlspecialchars($_POST['nip'])."',
            '".htmlspecialchars($_POST['nama'])."',
            '".htmlspecialchars($_POST['alamat'])."',
            '".htmlspecialchars($_POST['tempat_lahir'])."',
            '".htmlspecialchars($_POST['tanggal_lahir'])."'
        ) ";
    $rs = mysqli_query($db_conn,$sql);
    if ($rs)
        print 'Insert Data Pegawai BERHASIL!';
    else
        print 'Insert Data Pegawai GAGAL!';
}

// edit pegawai pegawai
if ($_POST['action']=='edit') {
    $sql = "
        update pegawai 
        set nip = '".htmlspecialchars($_POST['nip'])."',
            nama = '".htmlspecialchars($_POST['nama'])."',
            alamat = '".htmlspecialchars($_POST['alamat'])."',
            tempat_lahir = '".htmlspecialchars($_POST['tempat_lahir'])."',
            tanggal_lahir = '".htmlspecialchars($_POST['tanggal_lahir'])."'
        where id = '".htmlspecialchars($_POST['id'])."'
        ";
    $rs = mysqli_query($db_conn,$sql);
    if ($rs)
        print 'Update Data Pegawai BERHASIL!';
    else
        print 'Update Data Pegawai GAGAL!';
}

// delete pegawai pegawai
if ($_POST['action']=='delete') {
    $sql = "
        delete from pegawai 
        where id = '".htmlspecialchars($_POST['id'])."'
        ";
    $rs = mysqli_query($db_conn,$sql);
    if ($rs)
        print 'Delete Data Pegawai BERHASIL!';
    else
        print 'Delete Data Pegawai GAGAL!';
}

?>

<br />
<br />
<a href="index.php?f=pegawai-list">Kembali ke Daftar Pegawai</a>
