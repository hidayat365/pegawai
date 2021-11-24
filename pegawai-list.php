<h3>Daftar Pegawai</h3>
<a href="index.php?f=pegawai-form&action=create">Tambah Pegawai</a>

<br /><br />
<table cellpadding="2" cellspacing="1" border="1">
<tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Action</th>
</tr>

<?php
// ambil data pegawai dari database
// kemudian simpan ke array $data
$sql = 'select * from pegawai order by nip';
$rs = mysqli_query($db_conn,$sql);

// lakukan penjagaan, antisipasi error di database
if (!$rs) die ('Query GAGAL: ' . mysqli_error($db_conn));

// mulai proses data
$nomor = 0;
while ($row = mysqli_fetch_assoc($rs)) {
?>
<tr>
    <td><?php print ++$nomor; ?></td>
    <td><?php print $row['nip']; ?></td>
    <td><?php print $row['nama']; ?></td>
    <td><?php print $row['alamat']; ?></td>
    <td>
        &nbsp;<a href="index.php?f=pegawai-view&action=view&id=<?php print $row['id']; ?>">View</a>
        &nbsp;<a href="index.php?f=pegawai-form&action=edit&id=<?php print $row['id']; ?>">Edit</a>
        &nbsp;<a href="index.php?f=pegawai-view&action=delete&id=<?php print $row['id']; ?>">Delete</a>
        &nbsp;
    </td>
</tr>
<?php
} // end while
?>
</table>
