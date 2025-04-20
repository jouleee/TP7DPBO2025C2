<?php
require_once 'class/Lapangan.php';
require_once 'class/Pengguna.php';
require_once 'class/Transaksi.php';

$lapangan = new Lapangan();
$pengguna = new Pengguna();
$Transaksi = new Transaksi();

if (isset($_POST['booking'])) {
    $booking = $Transaksi->booking($_POST['id_pengguna'], $_POST['id_lapangan'], $_POST['tanggal'], $_POST['waktu_mulai'], $_POST['waktu_selesai']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Court Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Welcome to SARAGA ITB
        </h2>
        <nav>
            <ul>
                <li><a href="?page=pengguna">Data Pengguna</a></li>
                <li><a href="?page=lapangan">Data Lapangan</a></li>
                <li><a href="?page=booking">Data Booking</a></li>
            </ul>
        </nav>

    
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'pengguna') include 'view/pengguna.php';
            elseif ($page == 'lapangan') include 'view/lapangan.php';
            elseif ($page == 'booking') include 'view/booking.php';
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>