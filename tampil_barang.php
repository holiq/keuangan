<?php
require './header.php';
?>
<h2>Daftar Barang</h2>
<a href="/">Kembali</a>
<a href="./input_barang.php">Tambah Barang</a>
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $data = mysqli_query($koneksi, 'select kategori.nama_kategori, barang.* from barang JOIN kategori ON kategori.id_kategori=barang.kategori_id');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['nama_barang']; ?></td>
                <td><?= $d['kode_barang']; ?></td>
                <td><?= $d['nama_kategori']; ?></td>
                <td><?= $d['qty']; ?></td>
                <td><?= $d['harga']; ?></td>
                <td>
                    <a href="./edit_user.php?id=<?= $d['id_kategori'] ?>">EDIT</a>
                    <a href="./hapus_user.php?id=<?= $d['id_kategori'] ?>">HAPUS</a>
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