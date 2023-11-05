<?php
require './header.php';
?>
<h2>Daftar Level</h2>
<a href="/">Kembali</a>
<a href="./input_level.php">Tambah Level</a>
<table class="table">
    <thead>
        <tr>
            <th>Jenis</th>
            <th>Diskon</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, 'select * from level');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['jenis_level']; ?></td>
                <td><?= $d['diskon_level']; ?></td>
                <td>
                    <a href="./edit_user.php?id=<?= $d['id_level'] ?>">EDIT</a>
                    <a href="./hapus_user.php?id=<?= $d['id_level'] ?>">HAPUS</a>
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