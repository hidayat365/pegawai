<?php
// ambil id pegawai yang ingin diubah
$id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? '';

// ambil data pegawai dari database
// kemudian simpan ke array $data
$sql = "select * from pegawai where id = ?";
// prepare sql statement
$stmt = mysqli_prepare($db_conn, $sql);
// bind parameter to prevent sql injection
mysqli_stmt_bind_param($stmt, 'd', $id);
// execute sql statement
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $nip, $nama, $alamat, $tempat_lahir, $tanggal_lahir);

// tampilkan form hanya saat action create dan edit saja
if ($action=='create' or $row = mysqli_stmt_fetch($stmt)):
?>

<h3>Form <?= ucwords($action) ?> Pegawai</h3>

<form id="frmPegawai" name="frmPegawai" action="pegawai-proses.php" method="post">
    <table cellpadding="2" cellspacing="1" border="1">
    <tr>
        <th>NIP</th>
        <td><input type="text" name="nip" value="<?= $nip ?>" /></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><input type="text" name="nama" value="<?= $nama ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><input type="text" name="alamat" value="<?= $alamat ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td><input type="text" name="tempat_lahir" value="<?= $tempat_lahir ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>
            <input type="text" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" /> 
            (yyyy-mm-dd)&nbsp;
        </td>
    </tr>
    <tr>
        <?php /**
         * Berikut ini setting form untuk menentukan
         * apakah form ini merupakan form edit atau create 
         **/ ?>
        <td colspan="2">
            &nbsp;
            <?php if ($_GET['action']=='edit'): ?>
                <input type="hidden" name="id" value="<?php print $id; ?>" />
                <input type="hidden" name="action" value="edit" />
            <?php else: ?>
                <input type="hidden" name="action" value="create" />
            <?php endif; ?>
            <input type="submit" name="btnSimpan" value="Simpan" style="width: 100px;" />
            <a href="index.php?f=pegawai-list">Batal</a>
            &nbsp;
        </td>
    </tr>
    </table>
</form>

<?php
// end if
endif; 

// clean up memory
mysqli_stmt_close($stmt);
