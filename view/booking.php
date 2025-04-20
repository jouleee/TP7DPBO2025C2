<?php
require_once 'class/Transaksi.php';
require_once 'class/Pengguna.php';
require_once 'class/Lapangan.php';

$booking = new Transaksi();
$pengguna = new Pengguna();
$lapangan = new Lapangan();
?>

<h2>Daftar Booking Lapangan</h2>

<a href="?page=booking&aksi=tambah">+ Booking Baru</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Kode Booking</th>
        <th>Nama</th>
        <th>Lapangan</th>
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>jam Mulai</th>
        <th>jam Selesai</th>
    </tr>
    <?php foreach ($booking->getAllTransaction() as $row): ?>
    <tr>
        <td><?= $row['id_booking'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['nama_lapangan'] ?></td>
        <td><?= $row['jenis_lapangan'] ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['jam_mulai'] ?></td>
        <td><?= $row['jam_selesai'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah'): ?>
<h3>Form Booking Lapangan</h3>
<form method="POST" action="?page=booking">
    <label>Nama Member:</label>
    <select name="id_pengguna" required>
        <option value="">-- Pilih --</option>
        <?php foreach ($pengguna->getAllUser() as $user): ?>
            <option value="<?= $user['id_pengguna'] ?>"><?= $user['nama'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Lapangan:</label>
    <select name="id_lapangan" required>
        <option value="">-- Pilih --</option>
        <?php foreach ($lapangan->getAllLapangan() as $lap): ?>
            <option value="<?= $lap['id_lapangan'] ?>"><?= $lap['nama_lapangan'] ?> (<?= $lap['jenis_lapangan'] ?>)</option>
        <?php endforeach; ?>
    </select><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" required><br>
    <label>jam Mulai:</label>
    <input type="time" name="jam_mulai" required><br>
    <label>jam Selesai:</label>
    <input type="time" name="jam_selesai" required><br>

    <button type="submit" name="book">Booking</button>
</form>
<?php endif; ?>

<?php
// Logic Proses Booking
if (isset($_POST['book'])) {
    $booking->booking($_POST['id_pengguna'], $_POST['id_lapangan'], $_POST['tanggal'], $_POST['jam_mulai'], $_POST['jam_selesai']);
    header("Location: ?page=booking");
    exit;
}
?>

<!-- search booking by id booking -->
<form method="POST" action="?page=booking">
    <label>Cari Booking:</label>
    <input type="text" name="search" placeholder="Masukkan ID Booking">
    <button type="submit" name="cari">Cari</button>
</form>
<?php
if (isset($_POST['cari'])) {
    $search = $_POST['search'];
    $result = $booking->getTransactionById($search);
    if ($result) {
        echo "<h3>Hasil Pencarian:</h3>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID Booking</th><th>Nama</th><th>Lapangan</th><th>Jenis</th><th>Tanggal</th><th>jam Mulai</th><th>jam Selesai</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_booking'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['nama_lapangan'] . "</td>";
            echo "<td>" . $row['jenis_lapangan'] . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . $row['jam_mulai'] . "</td>";
            echo "<td>" . $row['jam_selesai'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Booking tidak ditemukan.";
    }
}
?>