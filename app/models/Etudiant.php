<?php
require_once __DIR__ . '/../core/Model.php';

class Etudiant extends Model {
    protected $table = 'etudiants';

    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY nom";
        $result = $this->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data) {
        $nom = $this->escape($data['nom']);
        $prenom = $this->escape($data['prenom']);
        $email = $this->escape($data['email']);
        $filiere = $this->escape($data['filiere']);

        $query = "INSERT INTO {$this->table} (nom, prenom, email, filiere) 
                 VALUES ('$nom', '$prenom', '$email', '$filiere')";
        
        return $this->query($query);
    }

    public function getById($id) {
        $id = (int)$id;
        $query = "SELECT * FROM {$this->table} WHERE id = $id";
        $result = $this->query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $data) {
        $id = (int)$id;
        $nom = $this->escape($data['nom']);
        $prenom = $this->escape($data['prenom']);
        $email = $this->escape($data['email']);
        $filiere = $this->escape($data['filiere']);

        $query = "UPDATE {$this->table} 
                 SET nom = '$nom', prenom = '$prenom', 
                     email = '$email', filiere = '$filiere' 
                 WHERE id = $id";
        
        return $this->query($query);
    }

    public function delete($id) {
        $id = (int)$id;
        $query = "DELETE FROM {$this->table} WHERE id = $id";
        return $this->query($query);
    }
}