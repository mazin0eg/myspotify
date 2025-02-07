<?php
require_once '../../core/Model.php';

class Song extends Model {
    public function getAllUsers() {
        $stmt = $this->db->conn->query("SELECT * FROM song");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
