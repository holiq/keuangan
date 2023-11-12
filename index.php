<?php
require './header.php';
include './koneksi.php';

if (!isset($_SESSION['login_status'])) {
    header("location:login.php");
}
?>

<h3>Laporan Transaksi</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="text-nowrap">
                <th>Member</th>
                <th>Level</th>
                <th>Diskon Member</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Diskon Barang</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Total Pembelian</th>
                <th>Diskon Belanja</th>
                <th>Total Diskon</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = mysqli_query($koneksi, "SELECT U.nama_user, L.jenis_level, L.diskon_level, K.diskon_kategori, K.nama_kategori, B.harga, B.nama_barang, T.jumlah_transaksi, T.total_belanja, T.diskon_belanja, T.total_diskon, T.total_pembayaran FROM transaksi T JOIN barang B ON T.barang_id = B.id_barang JOIN kategori K ON B.kategori_id = K.id_kategori JOIN user U ON T.user_id = U.id_user LEFT JOIN level L ON U.level_id = L.id_level");

            while ($d = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td><?= $d['nama_user']; ?></td>
                    <td><?= $d['jenis_level']; ?></td>
                    <td><?= $d['diskon_level'] . '%'; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td><?= $d['diskon_kategori'] . '%'; ?></td>
                    <td><?= $d['harga']; ?></td>
                    <td><?= $d['jumlah_transaksi']; ?></td>
                    <td><?= $d['total_belanja']; ?></td>
                    <td><?= $d['diskon_belanja'] . '%'; ?></td>
                    <td><?= '-' . $d['total_diskon']; ?></td>
                    <td><?= $d['total_pembayaran']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
require './footer.php';
?>
