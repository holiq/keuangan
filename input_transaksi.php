<?php
require './header.php';
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
<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Tambah Data Transaksi</h3>
            <a href="./tampil_transaksi.php">Kembali</a>
            <form method="post">
                <div class="mb-3">
                    <label for="no_transaksi" class="form-label">No Transaksi</label>
                    <input type="text" class="form-control" name="no_transaksi" id="no_transaksi">
                </div>
                <div class="mb-3">
                    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi">
                </div>
                <div class="mb-3">
                    <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                    <select name="jenis_transaksi" id="jenis_transaksi" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="jual">jual</option>
                        <option value="beli">beli</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="barang_id" class="form-label">Barang</label>
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
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pembeli</label>
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
                </div>
                <input type="submit" name="save" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>