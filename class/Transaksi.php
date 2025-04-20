<?php
require_once 'config/db.php';

class Transaksi {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllTransaction() {
        $stmt = $this->db->query("SELECT t_booking.*, t_lapangan.nama_lapangan, t_lapangan.jenis_lapangan, t_pengguna.nama
                                  FROM t_booking
                                  JOIN t_lapangan ON t_booking.id_lapangan = t_lapangan.id_lapangan
                                  JOIN t_pengguna ON t_booking.id_pengguna = t_pengguna.id_pengguna");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function booking($member_id, $court_id, $date, $start_time, $end_time) {
        $stmt = $this->db->prepare("INSERT INTO t_booking (id_pengguna, id_lapangan, tanggal, jam_mulai, jam_selesai) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$member_id, $court_id, $date, $start_time, $end_time]);
        return $this->db->lastInsertId();
    }

    public function getTransactionById($transaction_id) {
        $stmt = $this->db->prepare("SELECT * FROM t_booking WHERE id_transaksi = ?");
        $stmt->execute([$transaction_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>