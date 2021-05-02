<?php
$id = $_GET['id'] ?? 0;
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

// tampilkan data pegawai
if ($row = mysqli_stmt_fetch($stmt)): 
?>

<h3>View Pegawai</h3>
<form id="frmPegawai" name="frmPegawai" action="pegawai-proses.php" method="post">
    <table cellpadding="2" cellspacing="1" border="1">
    <tr>
        <th>NIP</th>
        <td><?php print $nip; ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php print $nama; ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php print $alamat; ?></td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td><?php print $tempat_lahir; ?></td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td><?php print $tanggal_lahir; ?></td>
    </tr>
    <tr>
        <th colspan="2">
            &nbsp;
            <?php if ($_GET['action']=='delete'): ?>
                <input type="submit" name="btnHapusPegawai" value="Hapus" style="width: 100px;" />
                <input type="hidden" name="id" value="<?php print $id; ?>" />
                <input type="hidden" name="action" value="delete" />
            <?php endif; ?>
            <a href="index.php?f=pegawai-list">Kembali ke Daftar Pegawai</a>
            &nbsp;
        </th>
    </tr>
    </table>
</form>

<?php 
// end if
endif; 

// clean up memory
mysqli_stmt_close($stmt);
