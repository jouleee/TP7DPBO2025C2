<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lapangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Lapangan</h2>

    <a href="?page=lapangan&aksi=tambah">+ Tambah Lapangan</a>

    <table>
        <tr>
            <th>Nama Lapangan</th>
            <th>Jenis Lapangan</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($lapangan->getAllLapangan() as $l): ?>
        <tr>
            <td><?= $l['nama_lapangan'] ?></td>
            <td><?= $l['jenis_lapangan'] ?></td>
            <td><?= $l['lokasi'] ?></td>
            <td>
                <form method="POST" action="?page=lapangan" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $l['id_lapangan'] ?>">
                    <button type="submit" name="delete_lapangan">Hapus</button>
                </form>
                <a href="?page=lapangan&aksi=edit&id=<?= $l['id_lapangan'] ?>" style="margin-left: 8px;">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form Tambah -->
    <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah'): ?>
    <h3>Tambah Lapangan</h3>
    <form method="POST" action="?page=lapangan">
        <label>Nama Lapangan:</label>
        <input type="text" name="nama_lapangan" required>
        <label>Jenis Lapangan:</label>
        <input type="text" name="jenis_lapangan" required>
        <label>Lokasi:</label>
        <input type="text" name="lokasi" required>
        <button type="submit" name="add_lapangan">Tambah</button>
    </form>
    <?php endif; ?>

    <!-- Form Edit -->
    <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit'): ?>
    <h3>Edit Lapangan</h3>
    <?php
        $l = $lapangan->getLapanganById($_GET['id']);
        if ($l):
    ?>
    <form method="POST" action="?page=lapangan">
        <input type="hidden" name="id" value="<?= $l['id_lapangan'] ?>">
        <label>Nama Lapangan:</label>
        <input type="text" name="nama_lapangan" value="<?= $l['nama_lapangan'] ?>" required>
        <label>Jenis Lapangan:</label>
        <input type="text" name="jenis_lapangan" value="<?= $l['jenis_lapangan'] ?>" required>
        <label>Lokasi:</label>
        <input type="text" name="lokasi" value="<?= $l['lokasi'] ?>" required>
        <button type="submit" name="update_lapangan">Update</button>
    </form>
    <?php else: ?>
        <p>Lapangan tidak ditemukan.</p>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Logika Proses -->
    <?php
    if (isset($_POST['add_lapangan'])) {
        $lapangan->addLapangan($_POST['nama_lapangan'], $_POST['jenis_lapangan'], $_POST['lokasi']);
        header("Location: ?page=lapangan");
    }

    if (isset($_POST['delete_lapangan'])) {
        $lapangan->deleteLapangan($_POST['id']);
        header("Location: ?page=lapangan");
    }

    if (isset($_POST['update_lapangan'])) {
        $lapangan->updateLapangan($_POST['id'], $_POST['nama_lapangan'], $_POST['jenis_lapangan'], $_POST['lokasi']);
        header("Location: ?page=lapangan");
    }
    ?>
</body>
</html>
