<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Registrasi Mahasiswa</h3>

                    <?php if ($this->session->flashdata('sukses')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('sukses'); ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('auth/do_register_mahasiswa') ?>">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Aktif:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Daftar</button>
                    </form>

                    <p class="text-center mt-3">
                        Sudah punya akun? <a href="<?= site_url('auth') ?>">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
