<?php
require './header.php';
?>
<h2>Daftar Transaksi</h2>
<a href="/">Kembali</a>
<a href="./input_transaksi.php">Tambah Transaksi</a>
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kode</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <?php
    include 'koneksi.php';

    $data = mysqli_query($koneksi, 'select transaksi.*, user.nama, barang.nama_barang from transaksi join user on transaksi.user_id=user.id_user join barang on transaksi.barang_id=barang.id_barang');

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['no_transaksi']; ?></td>
            <td><?= $d['jenis_transaksi']; ?></td>
            <td><?= $d['jumlah_transaksi']; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td>
                <a href="./edit_user.php?id=<?= $d['id_transaksi'] ?>">EDIT</a>
                <a href="./hapus_user.php?id=<?= $d['id_transaksi'] ?>">HAPUS</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
require './footer.php';
?>