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
                <td><?= $d['diskon']; ?></td>
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