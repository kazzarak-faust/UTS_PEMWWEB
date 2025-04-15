<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Event</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('event/update/' . $event->id) ?>" method="POST">
        <div class="form-group">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" id="nama_event" class="form-control" value="<?= $event->nama_event ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?= $event->deskripsi ?></textarea>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $event->tanggal ?>" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $event->lokasi ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('event') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
