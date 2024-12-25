<?php

// http://localhost:8060/index.php   le port du projet est la 
require_once __DIR__ . '/../app/core/ErrorHandler.php';
ErrorHandler::initialize();

require_once __DIR__ . '/../app/controllers/EtudiantController.php';
require_once __DIR__ . '/../app/controllers/CoursController.php';

$action = $_GET['action'] ?? 'etudiants';
$id = $_GET['id'] ?? null;
$method = $_GET['method'] ?? 'index';

try {
    switch ($action) {
        case 'etudiants':
            $controller = new EtudiantController();
            break;
        case 'cours':
            $controller = new CoursController();
            break;
        default:
            throw new Exception('Action non valide');
    }

    if (method_exists($controller, $method)) {
        if ($id !== null) {
            $controller->$method($id);
        } else {
            $controller->$method();
        }
    } else {
        throw new Exception('Méthode non valide');
    }
} catch (Exception $e) {
    ErrorHandler::handleException($e);
}
