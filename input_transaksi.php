<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemprograman3.com</title>
</head>
<?php
include 'koneksi.php';

if (!empty($_POST['save'])) {
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $no_transaksi = $_POST['no_transaksi'];
    $jenis_transaksi = $_POST['jenis_transaksi'];
    $barang_id = $_POST['barang_id'];
    $jumlah_transaksi = $_POST['jumlah_transaksi'];
    $user_id = $_POST['user_id'];

    $a = mysqli_query($koneksi, "insert into transaksi (tgl_transaksi, no_transaksi, jenis_transaksi, barang_id, jumlah_transaksi, user_id) VALUES ('$tgl_transaksi', '$no_transaksi', '$jenis_transaksi', '$barang_id', '$jumlah_transaksi', '$user_id')");

    if ($a) {
        header('location:tampil_transaksi.php');
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemprogaraman 3 2023</h2>
    <a href="./input_transaksi.php">Kembali</a>
    <h3>Tambah Data Transaksi</h3>
    <form method="post">
        <table>
            <tr>
                <td><label for="tgl_transaksi">Tanggal Transaksi</label></td>
                <td><input type="date" name="tgl_transaksi" id="tgl_transaksi"></td>
            </tr>
            <tr>
                <td>No Transaksi</td>
                <td><input type="number" name="no_transaksi" id="no_transaksi"></td>
            </tr>
            <tr>
                <td>Jenis Transaksi</td>
                <td>
                    <select name="jenis_transaksi" id="jenis_transaksi">
                        <option value="">--Pilih--</option>
                        <option value="jual">jual</option>
                        <option value="beli">beli</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>
                    <select name="barang_id" id="barang_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from barang');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Transaksi</td>
                <td><input type="number" name="jumlah_transaksi" id="jumlah_transaksi"></td>
            </tr>
            <tr>
                <td>User</td>
                <td>
                    <select name="user_id" id="user_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from user');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_user']; ?>"><?= $d['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SAVE" name="save"></td>
            </tr>
        </table>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (!Modernizr.inputtypes.date) {
                $('input[type=date]').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            }
        });
    </script>

</body>

</html>