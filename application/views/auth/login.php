<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login Mahasiswa</h3>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>

                    <form action="<?= site_url('auth/do_login') ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <p class="text-center mt-3">
                        Belum punya akun? <a href="<?= site_url('auth/register_mahasiswa') ?>">Daftar di sini</a>
                        <br><a style="text-decoration: none; color:black" href="<?= site_url('auth/login_admin') ?>">admin</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
