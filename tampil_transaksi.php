<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemprograman3.com</title>
</head>

<body>
    <h2>Pemprogaraman 3 2023</h2>
    <a href="/">Kembali</a>
    <a href="./input_transaksi.php">Tambah Transaksi</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $data = mysqli_query($koneksi, 'select transaksi.*, user.nama, barang.nama_barang from transaksi join user on transaksi.user_id=user.id_user join barang on transaksi.barang_id=barang.id_barang');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['tgl_transaksi']; ?></td>
                <td><?= $d['no_transaksi']; ?></td>
                <td><?= $d['jenis_transaksi']; ?></td>
                <td><?= $d['nama_barang']; ?></td>
                <td><?= $d['jumlah_transaksi']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td>
                    <a href="./edit_user.php?id=<?= $d['id'] ?>">EDIT</a>
                    <a href="./hapus_user.php?id=<?= $d['id'] ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>