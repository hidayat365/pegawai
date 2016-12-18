<?php
// ambil data pegawai dari database
// kemudian simpan ke array $data
if (isset($_GET['id'])) $id = $_GET['id'];
$sql = "select * from pegawai where id='".htmlspecialchars($id)."'";
$rs = mysqli_query($db_conn,$sql);
if ($row = mysqli_fetch_assoc($rs) or $_GET['action']=='create') {
?>

<h3>Form Pegawai</h3>

<form id="frmPegawai" name="frmPegawai" action="pegawai-proses.php" method="post">
    <table cellpadding="2" cellspacing="1" border="1">
    <tr>
        <th>NIP</th>
        <td><input type="text" name="nip" value="<?php print $row['nip']; ?>" /></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><input type="text" name="nama" value="<?php print $row['nama']; ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><input type="text" name="alamat" value="<?php print $row['alamat']; ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td><input type="text" name="tempat_lahir" value="<?php print $row['tempat_lahir']; ?>" size="50" /></td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>
            <input type="text" name="tanggal_lahir" value="<?php print $row['tanggal_lahir']; ?>" /> 
            (yyyy-mm-dd)&nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="2">
            &nbsp;
            <?php if ($_GET['action']=='edit') { ?>
                <input type="hidden" name="id" value="<?php print $row['id']; ?>" />
                <input type="hidden" name="action" value="edit" />
            <?php } else { ?>
                <input type="hidden" name="action" value="create" />
            <?php } ?>
            <input type="submit" name="btnSimpan" value="Simpan" style="width: 100px;" />
            <a href="index.php?f=pegawai-list">Batal</a>
            &nbsp;
        </td>
    </tr>
    </table>
</form>

<?php
} // end while
?>
