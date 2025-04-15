<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peserta Event</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-hover:hover {
            transform: scale(1.01);
            transition: 0.3s;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Peserta Event</a>
            <div class="ml-auto">
                <a href="<?= site_url('laporan') ?>" class="btn btn-outline-light btn-sm">Kembali</a>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light btn-sm ml-2">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow card-hover">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Daftar Peserta: <?= $event->nama_event ?> <small class="text-light">(<?= $event->tanggal ?>)</small></h5>
            </div>
            <div class="card-body">

                <?php if (!empty($peserta)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta as $index => $mhs): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $mhs->nama ?></td>
                                        <td><?= $mhs->email ?></td>
                                        <td><?= $mhs->username ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">Belum ada peserta yang terdaftar pada event ini.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>
