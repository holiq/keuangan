<?php
require './header.php';
include './koneksi.php';
include './validation.php';

if (!empty($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'] == '' ? null : md5($_POST['password']);

    $errors = validate(compact('username', 'password'));

    if (empty($errors)) {
        $getUser = mysqli_query($koneksi, "select * from user where user.username='$username' and user.password='$password'");
        $user = mysqli_fetch_array($getUser);

        if (empty($user)) {
            $errors[] = 'Akun tidak ditemukan';
        } else {
            unset($_SESSION['login_status']);

            $_SESSION['login_status'] = [
                'nama' => $user['nama_user'],
                'role' => $user['role']
            ];

            header("location:index.php");
        }
    }
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Login</h2>
                <?= response($errors) ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="LOGIN" />
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>