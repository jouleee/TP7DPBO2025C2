<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Pengguna</h2>

    <a href="?page=pengguna&aksi=tambah">+ Tambah Pengguna</a>

    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pengguna->getAllUser() as $user): ?>
        <tr>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['nomor_hp'] ?></td>
            <td>
                <form method="POST" action="?page=pengguna" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id_pengguna'] ?>">
                    <button type="submit" name="delete_user">Hapus</button>
                </form>
                <a href="?page=pengguna&aksi=edit&id=<?= $user['id_pengguna'] ?>" style="margin-left: 8px;">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form Tambah -->
    <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah'): ?>
    <h3>Tambah Pengguna</h3>
    <form method="POST" action="?page=pengguna">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Telepon:</label>
        <input type="text" name="nomor_hp" required>
        <button type="submit" name="add_user">Tambah</button>
    </form>
    <?php endif; ?>

    <!-- Form Edit -->
    <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit'): ?>
    <h3>Edit Pengguna</h3>
    <?php
        $user = $pengguna->getUserById($_GET['id']);
        if ($user):
    ?>
    <form method="POST" action="?page=pengguna">
        <input type="hidden" name="id" value="<?= $user['id_pengguna'] ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $user['nama'] ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <label>Telepon:</label>
        <input type="text" name="nomor_hp" value="<?= $user['nomor_hp'] ?>" required>
        <button type="submit" name="update_user">Update</button>
    </form>
    <?php else: ?>
        <p>Pengguna tidak ditemukan.</p>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Logika Proses -->
    <?php
    if (isset($_POST['add_user'])) {
        $pengguna->addUser($_POST['nama'], $_POST['email'], $_POST['nomor_hp']);
        header("Location: ?page=pengguna");
    }

    if (isset($_POST['delete_user'])) {
        $pengguna->deleteUser($_POST['id']);
        header("Location: ?page=pengguna");
    }

    if (isset($_POST['update_user'])) {
        $pengguna->updateUser($_POST['id'], $_POST['nama'], $_POST['email'], $_POST['nomor_hp']);
        header("Location: ?page=pengguna");
    }
    ?>
</body>
</html>
