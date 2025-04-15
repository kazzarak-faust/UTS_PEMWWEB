<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-hover:hover {
            transform: scale(1.02);
            transition: 0.3s;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('home') ?>">Dashboard Mahasiswa</a>
            <div class="ml-auto">
                <span class="text-white mr-3">
                    <?= $this->session->userdata('mahasiswa')->nama ?>
                </span>
                <a href="<?= site_url('home') ?>" class="btn btn-light btn-sm">Home</a>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">Daftar Event Kampus</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-hover shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= $event->nama_event ?></h5>
                            <p class="card-text"><strong>Tanggal:</strong> <?= $event->tanggal ?></p>
                            <p class="card-text"><?= word_limiter($event->deskripsi, 20) ?></p>

                            <?php if (in_array($event->id, $event_terdaftar)): ?>
                                <button class="btn btn-success btn-block" disabled>Sudah Terdaftar</button>
                            <?php else: ?>
                                <form action="<?= site_url('dashboard/daftar_event/' . $event->id) ?>" method="post">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($events)): ?>
            <div class="alert alert-warning">Belum ada event yang tersedia saat ini.</div>
        <?php endif; ?>
    </div>

</body>
</html>
