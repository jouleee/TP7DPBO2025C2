<?php
require_once 'config/db.php';

class Lapangan{
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllLapangan() {
        $stmt = $this->db->query("SELECT * FROM t_lapangan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLapanganById($id) {
        $stmt = $this->db->prepare("SELECT * FROM t_lapangan WHERE id_lapangan = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addLapangan($name, $type, $location) {
        $stmt = $this->db->prepare("INSERT INTO t_lapangan (nama_lapangan, jenis_lapangan, lokasi) VALUES (?, ?, ?)");
        $stmt->execute([$name, $type, $location]);
        return $this->db->lastInsertId();
    }

    public function deleteLapangan($id) {
        $stmt = $this->db->prepare("DELETE FROM t_lapangan WHERE id_lapangan = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    public function updateLapangan($id, $name, $type, $location) {
        $stmt = $this->db->prepare("UPDATE t_lapangan SET nama_lapangan = ?, jenis_lapangan = ?, lokasi = ? WHERE id_lapangan = ?");
        $stmt->execute([$name, $type, $location, $id]);
        return $stmt->rowCount();
    }
}
?>