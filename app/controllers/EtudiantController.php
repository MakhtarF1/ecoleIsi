<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Etudiant.php';
require_once __DIR__ . '/../utils/Validator.php';

class EtudiantController extends Controller {
    private $etudiantModel;

    public function __construct() {
        $this->etudiantModel = new Etudiant();
    }

    public function index() {
        $etudiants = $this->etudiantModel->getAll();
        $this->render('etudiants/index', ['etudiants' => $etudiants]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requiredFields = ['nom', 'prenom', 'email', 'filiere'];
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $error = "Le champ $field est obligatoire.";
                    $this->render('etudiants/create', ['error' => $error]);
                    return;
                }
            }
    
            if ($this->validateEtudiant($_POST)) {
                if ($this->etudiantModel->create($_POST)) {
                    $this->redirect('index.php?action=etudiants');
                } else {
                    $error = "Une erreur est survenue lors de la création.";
                }
            } else {
                $error = "Données invalides.";
            }
        }
        $this->render('etudiants/create', isset($error) ? ['error' => $error] : []);
    }
    

    public function edit($id) {
        $etudiant = $this->etudiantModel->getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->validateEtudiant($_POST)) {
                if ($this->etudiantModel->update($id, $_POST)) {
                    $this->redirect('index.php?action=etudiants');
                }
            }
        }
        $this->render('etudiants/edit', ['etudiant' => $etudiant]);
    }

    public function delete($id) {
        if ($this->etudiantModel->delete($id)) {
            $this->redirect('index.php?action=etudiants');
        }
    }

    private function validateEtudiant($data) {
        return Validator::required($data['nom']) &&
               Validator::required($data['prenom']) &&
               Validator::email($data['email']) &&
               Validator::required($data['filiere']);
    }
}