<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Event</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">Riwayat Event</a>
            <div class="ml-auto">
                <a href="<?= site_url('home') ?>" class="btn btn-light btn-sm">Home</a>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light btn-sm ml-2">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">Riwayat Event yang Diikuti</h2>

        <?php if (empty($events)): ?>
            <div class="alert alert-warning">Belum ada event yang diikuti.</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($events as $event): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $event->nama_event ?></h5>
                                <p class="card-text"><strong>Tanggal:</strong> <?= $event->tanggal ?></p>
                                <p class="card-text"><?= word_limiter($event->deskripsi, 20) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
