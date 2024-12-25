<?php
require_once __DIR__ . '/../database.php';

class Cours {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM cours ORDER BY nom_cours";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data) {
        $nom_cours = $this->db->real_escape_string($data['nom_cours']);
        $code_cours = $this->db->real_escape_string($data['code_cours']);
        $nombre_heures = (int)$data['nombre_heures'];

        $query = "INSERT INTO cours (nom_cours, code_cours, nombre_heures) 
                 VALUES ('$nom_cours', '$code_cours', $nombre_heures)";
        
        return $this->db->query($query);
    }

    public function getById($id) {
        $id = (int)$id;
        $query = "SELECT * FROM cours WHERE id = $id";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $data) {
        $id = (int)$id;
        $nom_cours = $this->db->real_escape_string($data['nom_cours']);
        $code_cours = $this->db->real_escape_string($data['code_cours']);
        $nombre_heures = (int)$data['nombre_heures'];

        $query = "UPDATE cours 
                 SET nom_cours = '$nom_cours', 
                     code_cours = '$code_cours', 
                     nombre_heures = $nombre_heures 
                 WHERE id = $id";
        
        return $this->db->query($query);
    }

    public function delete($id) {
        $id = (int)$id;
        $query = "DELETE FROM cours WHERE id = $id";
        return $this->db->query($query);
    }
}