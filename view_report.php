<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemprograman3.com</title>
</head>

<body>
    <h2>Pemprogaraman 3 2023</h2>
    <h5>Laporan Transaksi</h5>
    <table border="1">
        <tr>
            <th>Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Barang</th>
            <th>Jenis Barang</th>
            <th>Diskon Barang</th>
            <th>Harga Satuan</th>
            <th>Qty</th>
            <th>Total Pembelian</th>
            <th>Diskon Belanja</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        include 'koneksi.php';


        $data = mysqli_query($koneksi, "SELECT U.nama, L.jenis_level, L.jumlah_diskon_level, K.diskon, K.nama_kategori, B.harga, B.nama_barang, T.jumlah_transaksi FROM transaksi T JOIN barang B ON T.barang_id = B.id_barang JOIN kategori K ON B.kategori_id = K.id_kategori JOIN user U ON T.user_id = U.id_user JOIN level L ON U.id_level = L.id_level");

        while ($d = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $level = $d['jenis_level'];
            $totalHarga = $d['harga'] * $d['jumlah_transaksi'];

            if ($totalHarga > 100000) {
                $diskonBelanja = 10;
            } else {
                $diskonBelanja = 0;
            }
            $totalDiskon = $totalHarga * (($diskonBelanja + $d['jumlah_diskon_level'] + $d['diskon']) / 100);
            $totalTransaksi = $totalHarga - $totalDiskon;
        ?>
            <tr>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['jenis_level']; ?></td>
                <td><?= $d['jumlah_diskon_level'] . '%'; ?></td>
                <td><?= $d['nama_barang']; ?></td>
                <td><?= $d['nama_kategori']; ?></td>
                <td><?= $d['diskon'] . '%'; ?></td>
                <td><?= $d['harga']; ?></td>
                <td><?= $d['jumlah_transaksi']; ?></td>
                <td><?= $totalHarga; ?></td>
                <td><?= $diskonBelanja . '%'; ?></td>
                <td><?= $totalDiskon; ?></td>
                <td><?= $totalTransaksi; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>