<?php
require_once 'config/db.php';

class Pengguna {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllUser() {
        $stmt = $this->db->query("SELECT * FROM t_pengguna");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserbyId($id) {
        $stmt = $this->db->prepare("SELECT * FROM t_pengguna WHERE id_pengguna = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($name, $email, $phone) {
        $stmt = $this->db->prepare("INSERT INTO t_pengguna (nama, email, nomor_hp) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $phone]);
        return $this->db->lastInsertId();
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM t_pengguna WHERE id_pengguna = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    public function updateUser($id, $name, $email, $phone) {
        $stmt = $this->db->prepare("UPDATE t_pengguna SET nama = ?, email = ?, telepon = ? WHERE id_pengguna = ?");
        $stmt->execute([$name, $email, $phone, $id]);
        return $stmt->rowCount();
    }
}
?>