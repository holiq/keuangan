<?php
require './header.php';
include './koneksi.php';
include './validation.php';

if (!empty($_POST['save'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'] == '' ? null : md5($_POST['password']);
    $role = $_POST['role'];
    $level_id = $_POST['level_id'];
    $level = !empty($level_id) ? "'$level_id'" : "null";
    $status = $_POST['status'];

    $errors = validate(compact('nama', 'username', 'password', 'role', 'status'));

    if (empty($errors)) {
        $a = mysqli_query($koneksi, "insert into user (nama_user, username, password, role, status, level_id) VALUES ('$nama', '$username', '$password', '$role', '$status', $level)");

        if ($a) {
            header('location:tampil_user.php');
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
                <h2 class="text-center">Tambah Data User</h2>
                <?= response($errors) ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usernama</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="">--Pilih--</option>
                            <option value="admin">Admin</option>
                            <option value="staf">Staf</option>
                            <option value="spv">SPV</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">--Pilih--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="level_id" class="form-label">Level</label>
                        <select class="form-control" name="level_id" id="level_id">
                            <option value="">--Pilih--</option>
                            <?php
                            $data = mysqli_query($koneksi, 'select * from level');

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $d['id_level']; ?>"><?= $d['jenis_level']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-primary">
                        <a class="btn btn-danger" href="./tampil_user.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>