<?php
require './header.php';
?>
<h2>Daftar Kategori</h2>
<a href="/">Kembali</a>
<a href="./input_kategori.php">Tambah Kategori</a>
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Diskon</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, 'select * from kategori');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['nama_kategori']; ?></td>
                <td><?= $d['diskon_kategori']; ?></td>
                <td>
                    <?php if ($role == 'admin' || $role == 'manager' || $role == 'spv'): ?>
                    <a href="./edit_kategori.php?id=<?= $d['id_kategori'] ?>">EDIT</a>
                    <a href="./hapus_kategori.php?id=<?= $d['id_kategori'] ?>">HAPUS</a>
                    <?php else: ?>
                    <span>-</span>
                    <?php endif; ?>
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