<?php
require './header.php';
?>
<h2>Daftar User</h2>
<a href="/">Kembali</a>
<a href="./input_user.php">Tambah Data User</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Level</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, 'select user.*, level.* from user left join level on level.id_level=user.level_id');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama_user']; ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['role']; ?></td>
                <td><?= $d['status']; ?></td>
                <td><?= $d['jenis_level'] ?? '-'; ?></td>
                <td>
                    <a href="./edit_user.php?id=<?= $d['id'] ?>">EDIT</a>
                    <a href="./hapus_user.php?id=<?= $d['id'] ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require './footer.php';
?>