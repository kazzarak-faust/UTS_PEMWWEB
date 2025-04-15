<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Event Kampus</a>
            <div class="ml-auto">
                <span class="text-white mr-3">
                    <?php
                        if ($this->session->userdata('admin')) {
                            echo "Admin: " . $this->session->userdata('admin')->nama;
                        } elseif ($this->session->userdata('mahasiswa')) {
                            echo "Mahasiswa: " . $this->session->userdata('mahasiswa')->nama;
                        }
                    ?>
                </span>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if ($this->session->userdata('admin')): ?>
            <h2 class="mb-4">Selamat Datang, Admin</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="<?= site_url('event') ?>" class="btn btn-outline-primary btn-block p-3 shadow-sm">📅 Kelola Event</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="<?= site_url('laporan') ?>" class="btn btn-outline-success btn-block p-3 shadow-sm">📄 Laporan Peserta</a>
                </div>
            </div>

        <?php elseif ($this->session->userdata('mahasiswa')): ?>
            <h2 class="mb-4">Selamat Datang, Mahasiswa</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-info btn-block p-3 shadow-sm">📌 Daftar Event</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="<?= site_url('dashboard/riwayat') ?>" class="btn btn-outline-secondary btn-block p-3 shadow-sm">📜 Riwayat Pendaftaran</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">Silakan login terlebih dahulu.</div>
        <?php endif; ?>
    </div>

</body>
</html>
