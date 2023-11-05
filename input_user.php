<?php
require './header.php';
include 'koneksi.php';

if (!empty($_POST['save'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $level_id = $_POST['level_id'];
  $status = $_POST['status'];

  $a = mysqli_query($koneksi, "insert into user (nama, username, password, role, status, id_level) VALUES ('$nama', '$username', '$password', '$role', '$status', '$level_id')");

  if ($a) {
    header('location:tampil_user.php');
  } else {
    echo mysqli_error($koneksi);
  }
}
?>
<div class="d-flex justify-content-center">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Level</h3>
      <a href="./tampil_level.php">Kembali</a>
      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
          <label for="usernama" class="form-label">Usernama</label>
          <input type="text" class="form-control" name="usernama" id="usernama">
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
            <option value="staff">Staff</option>
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
        <input type="submit" name="save" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
<?php
require './footer.php';
?>