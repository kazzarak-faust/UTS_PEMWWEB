<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login Admin</h3>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                        <?php endif; ?>
                        <form method="post" action="<?= site_url('auth/do_login') ?>">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3"><a href="<?= site_url('auth') ?>">Login sebagai Mahasiswa</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
