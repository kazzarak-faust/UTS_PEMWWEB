<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Manajemen Event</a>
            <div class="ml-auto">
                <a href="<?= site_url('home') ?>" class="btn btn-outline-light btn-sm">🏠 Kembali</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Daftar Event Kampus</h2>
            <a href="<?= site_url('event/tambah') ?>" class="btn btn-success">+ Tambah Event</a>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-striped bg-white">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($events)): ?>
                        <?php $no = 1; foreach ($events as $event): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $event->nama_event ?></td>
                                <td><?= $event->tanggal ?></td>
                                <td><?= word_limiter($event->deskripsi, 15) ?></td>
                                <td>
                                    <a href="<?= site_url('event/edit/' . $event->id) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                                    <a href="<?= site_url('event/delete/' . $event->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus event ini?')">🗑 Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada event.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
