<?php
require_once __DIR__ . '/../models/Cours.php';

class CoursController {
    private $coursModel;

    public function __construct() {
        $this->coursModel = new Cours();
    }

    public function index() {
        $cours = $this->coursModel->getAll();
        // Utilisation d'un chemin absolu basé sur __DIR__
        require __DIR__ . '/../views/cours/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->coursModel->create($_POST)) {
                header('Location: index.php?action=cours');
                exit;
            }
        }
        // Utilisation d'un chemin absolu basé sur __DIR__
        require __DIR__ . '/../views/cours/create.php';
    }

    public function edit($id) {
        $cours = $this->coursModel->getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->coursModel->update($id, $_POST)) {
                header('Location: index.php?action=cours');
                exit;
            }
        }
        // Utilisation d'un chemin absolu basé sur __DIR__
        require __DIR__ . '/../views/cours/edit.php';
    }

    public function delete($id) {
        if ($this->coursModel->delete($id)) {
            header('Location: index.php?action=cours');
            exit;
        }
    }
}
