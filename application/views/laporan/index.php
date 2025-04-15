<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peserta Event</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-hover:hover {
            transform: scale(1.01);
            transition: 0.3s;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Laporan Peserta</a>
            <div class="ml-auto">
                <a href="<?= site_url('home') ?>" class="btn btn-outline-light btn-sm">Kembali ke Home</a>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light btn-sm ml-2">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-4">Daftar Peserta Per Event</h3>

        <?php foreach ($events as $event): ?>
            <div class="card mb-4 shadow-sm card-hover">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><?= $event->nama_event ?> <small class="text-light">(<?= $event->tanggal ?>)</small></h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($event->peserta)): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($event->peserta as $index => $peserta): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $peserta->nama ?></td>
                                            <td><?= $peserta->email ?></td>
                                            <td><?= $peserta->username ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">Belum ada peserta yang terdaftar.</div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
