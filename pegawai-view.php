<?php
// ambil data pegawai dari database
// kemudian simpan ke array $data
$sql = "select * from pegawai where id='".htmlspecialchars($_GET['id'])."'";
$rs = mysqli_query($db_conn,$sql);
?>

<?php if ($row = mysqli_fetch_assoc($rs)): ?>

<h3>View Pegawai</h3>
<form id="frmPegawai" name="frmPegawai" action="pegawai-proses.php" method="post">
    <table cellpadding="2" cellspacing="1" border="1">
    <tr>
        <th>NIP</th>
        <td><?php print $row['nip']; ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php print $row['nama']; ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php print $row['alamat']; ?></td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td><?php print $row['tempat_lahir']; ?></td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td><?php print $row['tanggal_lahir']; ?></td>
    </tr>
    <tr>
        <th colspan="2">
            &nbsp;
            <?php if ($_GET['action']=='delete'): ?>
                <input type="submit" name="btnHapusPegawai" value="Hapus" style="width: 100px;" />
                <input type="hidden" name="id" value="<?php print $row['id']; ?>" />
                <input type="hidden" name="action" value="delete" />
            <?php endif; ?>
            <a href="index.php?f=pegawai-list">Kembali ke Daftar Pegawai</a>
            &nbsp;
        </th>
    </tr>
    </table>
</form>

<?php endif; ?>
