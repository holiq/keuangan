<?php
require './header.php';
include './koneksi.php';
include './validation.php';

$getTransaksi = mysqli_query($koneksi, "select count(id_transaksi) as totalId from transaksi");
$transaksi = mysqli_fetch_array($getTransaksi);
$idTransaksi = 'TRX' . str_pad($transaksi['totalId'] + 1, 6, '0', STR_PAD_LEFT);

if (!empty($_POST['save'])) {
    $tanggal_transaksi = $_POST['tgl_transaksi'];
    $no_transaksi = $idTransaksi;
    $jenis_transaksi = $_POST['jenis_transaksi'];
    $barang_id = $_POST['barang_id'];
    $jumlah_transaksi = $_POST['jumlah_transaksi'];
    $user = $_POST['user_id'];
    $errors = validate(compact('tanggal_transaksi', 'jenis_transaksi', 'user', 'barang', 'jumlah_transaksi'));

    if (empty($errors)) {
        $getBarang = mysqli_query($koneksi, "select kategori.*, barang.* from barang join kategori on barang.kategori_id=kategori.id_kategori where id_barang='$barang_id'");
        $barang = mysqli_fetch_array($getBarang);
        $diskonBarang = $barang['diskon_kategori'];
        $getLevel = mysqli_query($koneksi, "select level.* from user join level on user.level_id=level.id_level where user.id_user='$user'");
        $level = mysqli_fetch_array($getLevel);
        $diskonLevel = $level['diskon_level'] ?? 0;
        $totalBelanja = $jumlah_transaksi * $barang['harga'];
        $diskonBelanja = $totalBelanja >= 100000 ? 10 : 0;
        $totalDiskon = $totalBelanja * (($diskonBelanja + $diskonLevel + $diskonBarang) / 100);
        $totalPembayaran = $totalBelanja - $totalDiskon;

        $a = mysqli_query($koneksi, "insert into transaksi (tanggal_transaksi, nomor_transaksi, jenis_transaksi, barang_id, jumlah_transaksi, user_id, diskon_barang, diskon_level, total_belanja, diskon_belanja, total_diskon, total_pembayaran) VALUES ('$tanggal_transaksi', '$no_transaksi', '$jenis_transaksi', '$barang_id', '$jumlah_transaksi', '$user', '$diskonBarang', '$diskonLevel', '$totalBelanja', '$diskonBelanja', '$totalDiskon', '$totalPembayaran')");

        if ($a) {
            header('location:tampil_transaksi.php');
        } else {
            echo mysqli_error($koneksi);
        }
    }
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Tambah Data Transaksi</h2>
                <?= response($errors) ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="no_transaksi" class="form-label">No Transaksi</label>
                        <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" value="<?= $idTransaksi; ?>" readonly>
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
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">--Pilih--</option>
                            <?php
                            $data = mysqli_query($koneksi, 'select * from user');

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $d['id_user']; ?>"><?= $d['nama_user']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select class="form-control" name="barang_id" id="barang_id">
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
                        <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                        <input type="number" class="form-control" name="jumlah_transaksi" id="jumlah_transaksi">
                    </div>
                    <div class="d-flex justify-content-end gap-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-primary">
                        <a class="btn btn-danger" href="./tampil_transaksi.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>