<?php
require './header.php';
include 'koneksi.php';

if (!empty($_POST['save'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $msg = '';

    if (empty($username) && empty($password)) {
        $msg = 'Username dan Password tidak boleh kosong';
    } else {
        if (empty($username)) {
            $msg = 'Username tidak boleh kosong';
        }
        if (empty($password)) {
            $msg = 'Password tidak boleh kosong';
        }

        $getUser = mysqli_query($koneksi, "select * from user where user.username='$username' and user.password='$password'");
        $user = mysqli_fetch_array($getUser);

        if (empty($user)) {
            $msg = 'Akun tidak ditemukan';
        } else {
            unset($_SESSION['login_status']);

            $_SESSION['login_status'] = $user['nama_user'];

            header("location:index.php");
        }
    }
}
?>

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">LOGIN</h3>
            <?php
            if (isset($msg)) :
            ?>
                <div class="bg-danger text-white rounded px-2">
                    <ul>
                        <li>
                            <?= $msg; ?>
                        </li>
                    </ul>
                </div>
            <?php
            endif;
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <input type="submit" name="save" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>